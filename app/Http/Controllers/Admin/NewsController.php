<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\NewsImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    // ============ FRONTEND (sudah ada, jangan diubah) ============

    public function index()
    {
        $featured = News::where('status', 'published')
            ->where('featured', true)
            ->latest('published_at')
            ->first();

        $newsList = News::where('status', 'published')
            ->when($featured, fn($q) => $q->where('id', '!=', $featured->id))
            ->select('id', 'title', 'slug', 'thumbnail', 'category', 'content', 'excerpt', 'author', 'views', 'published_at')
            ->latest('published_at')
            ->paginate(9);

        foreach ($newsList as $news) {
            $news->excerpt = $news->excerpt ?: Str::limit(strip_tags($news->content), 130);
        }

        if ($featured) {
            $featured->excerpt = $featured->excerpt ?: Str::limit(strip_tags($featured->content), 200);
        }

        return view('frontend.news', ['title' => 'Dashboard RSUD Ar Rozy',  'active' => 'news'], compact('newsList', 'featured'));
    }

    public function show($slug)
    {
        $news = News::where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        $news->increment('views');

        $related = News::where('status', 'published')
            ->where('id', '!=', $news->id)
            ->where('category', $news->category)
            ->latest('published_at')
            ->take(3)
            ->get();

        $contentBlocks = $this->buildContentBlocks($news->content, $news->images);

        return view('frontend.show', ['title' => 'Dashboard RSUD Ar Rozy',  'active' => 'news'], compact('news', 'related', 'contentBlocks'));
    }

    private function buildContentBlocks(string $content, $images): array
    {
        preg_match_all('/<p[^>]*>.*?<\/p>/is', $content, $matches);
        $paragraphs = $matches[0];

        if (empty($paragraphs)) {
            $paragraphs = [$content];
        }

        $blocks = [];

        if ($images->isEmpty()) {
            $blocks[] = ['type' => 'html', 'value' => implode('', $paragraphs)];
            return $blocks;
        }

        $totalParagraphs = count($paragraphs);
        $totalImages = $images->count();

        $step = max(1, intdiv($totalParagraphs, $totalImages + 1));
        $insertAfter = [];
        for ($i = 1; $i <= $totalImages; $i++) {
            $insertAfter[] = min($totalParagraphs, $step * $i);
        }

        $imageIndex = 0;
        foreach ($paragraphs as $i => $paragraph) {
            $blocks[] = ['type' => 'html', 'value' => $paragraph];

            $currentPosition = $i + 1;
            if (in_array($currentPosition, $insertAfter) && $imageIndex < $totalImages) {
                $blocks[] = ['type' => 'image', 'value' => $images[$imageIndex]];
                $imageIndex++;
            }
        }

        return $blocks;
    }

    // ============ ADMIN CRUD (baru) ============

    public function adminIndex(Request $request)
    {
        $news = News::query()
            ->when($request->search, fn($q) => $q->where('title', 'like', '%' . $request->search . '%'))
            ->when($request->status, fn($q) => $q->where('status', $request->status))
            ->latest('created_at')
            ->paginate(10)
            ->withQueryString();

        return view('admin.news.index', [
            'title' => 'Kelola Berita',
            'newsList' => $news,
        ]);
    }

    public function create()
    {
        return view('admin.news.create', [
            'title' => 'Tambah Berita',
        ]);
    }

    public function store(Request $request)
    {
        $validated = $this->validateNews($request);

        $validated['slug'] = $this->generateUniqueSlug($validated['title']);

        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('news/thumbnails', 'public');
        }

        $validated['excerpt'] = $validated['excerpt'] ?: Str::limit(strip_tags($validated['content']), 150);
        $validated['featured'] = $request->boolean('featured');
        $validated['published_at'] = $validated['status'] === 'published'
            ? ($validated['published_at'] ?? now())
            : $validated['published_at'];

        $news = News::create($validated);

        $this->storeImages($request, $news);

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil ditambahkan.');
    }

    public function edit(News $news)
    {
        $news->load('images');

        return view('admin.news.edit', [
            'title' => 'Edit Berita',
            'news' => $news,
        ]);
    }

    public function update(Request $request, News $news)
    {
        $validated = $this->validateNews($request, $news->id);

        if ($validated['title'] !== $news->title) {
            $validated['slug'] = $this->generateUniqueSlug($validated['title'], $news->id);
        }

        if ($request->hasFile('thumbnail')) {
            if ($news->thumbnail && !str_starts_with($news->thumbnail, '/')) {
                Storage::disk('public')->delete($news->thumbnail);
            }
            $validated['thumbnail'] = $request->file('thumbnail')->store('news/thumbnails', 'public');
        }

        $validated['excerpt'] = $validated['excerpt'] ?: Str::limit(strip_tags($validated['content']), 150);
        $validated['featured'] = $request->boolean('featured');

        $news->update($validated);

        $this->storeImages($request, $news);

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy(News $news)
    {
        if ($news->thumbnail && !str_starts_with($news->thumbnail, '/')) {
            Storage::disk('public')->delete($news->thumbnail);
        }

        foreach ($news->images as $image) {
            if (!str_starts_with($image->image_path, '/')) {
                Storage::disk('public')->delete($image->image_path);
            }
        }

        $news->delete();

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil dihapus.');
    }

    public function destroyImage(NewsImage $image)
    {
        if (!str_starts_with($image->image_path, '/')) {
            Storage::disk('public')->delete($image->image_path);
        }

        $image->delete();

        return back()->with('success', 'Foto berhasil dihapus.');
    }

    private function validateNews(Request $request, ?int $newsId = null): array
    {
        return $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'author' => 'required|string|max:100',
            'content' => 'required|string',
            'excerpt' => 'nullable|string|max:255',
            'status' => 'required|in:draft,published',
            'featured' => 'nullable|boolean',
            'thumbnail' => ($newsId ? 'nullable' : 'required') . '|image|max:20000',
            'published_at' => 'nullable|date',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
            'meta_keywords' => 'nullable|string|max:255',
            'images.*' => 'nullable|image|max:20000',
            'image_captions.*' => 'nullable|string|max:255',
        ]);
    }

    private function generateUniqueSlug(string $title, ?int $ignoreId = null): string
    {
        $slug = Str::slug($title);
        $original = $slug;
        $count = 1;

        while (
            News::where('slug', $slug)
            ->when($ignoreId, fn($q) => $q->where('id', '!=', $ignoreId))
            ->exists()
        ) {
            $slug = $original . '-' . $count;
            $count++;
        }

        return $slug;
    }

    private function storeImages(Request $request, News $news): void
    {
        if (!$request->hasFile('images')) {
            return;
        }

        $captions = $request->input('image_captions', []);
        $lastOrder = $news->images()->max('order') ?? 0;

        foreach ($request->file('images') as $index => $file) {
            $lastOrder++;

            NewsImage::create([
                'news_id' => $news->id,
                'image_path' => $file->store('news/images', 'public'),
                'caption' => $captions[$index] ?? null,
                'order' => $lastOrder,
            ]);
        }
    }
}
