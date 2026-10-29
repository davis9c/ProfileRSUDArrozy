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
        $content = trim($content);

        if ($content === '') {
            return [];
        }

        /*
         * Tanpa foto tambahan, tampilkan seluruh HTML apa adanya.
         * Jangan memfilter hanya tag <p>, karena heading, list,
         * blockquote, dan elemen block lainnya juga harus ikut tampil.
         */
        if ($images->isEmpty()) {
            return [
                ['type' => 'html', 'value' => $content],
            ];
        }

        $htmlBlocks = $this->splitContentIntoBlocks($content);
        $totalBlocks = count($htmlBlocks);

        if ($totalBlocks === 0) {
            $htmlBlocks = [$content];
            $totalBlocks = 1;
        }

        $totalImages = $images->count();
        $step = max(1, intdiv($totalBlocks, $totalImages + 1));

        $insertAfter = [];
        for ($i = 1; $i <= $totalImages; $i++) {
            $insertAfter[min($totalBlocks, $step * $i)] = true;
        }

        $blocks = [];
        $imageIndex = 0;

        foreach ($htmlBlocks as $index => $htmlBlock) {
            $blocks[] = ['type' => 'html', 'value' => $htmlBlock];

            $currentPosition = $index + 1;

            if (isset($insertAfter[$currentPosition]) && $imageIndex < $totalImages) {
                $blocks[] = ['type' => 'image', 'value' => $images[$imageIndex]];
                $imageIndex++;
            }
        }

        /*
         * Jika jumlah foto lebih banyak daripada jumlah blok,
         * sisipkan sisanya di akhir agar tidak ada foto yang hilang.
         */
        while ($imageIndex < $totalImages) {
            $blocks[] = ['type' => 'image', 'value' => $images[$imageIndex]];
            $imageIndex++;
        }

        return $blocks;
    }

    /**
     * Pecah HTML menjadi blok-blok top-level (p, heading, list, dll).
     */
    private function splitContentIntoBlocks(string $content): array
    {
        $previousUseErrors = libxml_use_internal_errors(true);

        $dom = new \DOMDocument('1.0', 'UTF-8');

        $loaded = $dom->loadHTML(
            '<?xml encoding="UTF-8"><div id="__news_content_root">' . $content . '</div>',
            LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD
        );

        libxml_clear_errors();
        libxml_use_internal_errors($previousUseErrors);

        if (!$loaded) {
            return [$content];
        }

        $root = null;

        foreach ($dom->getElementsByTagName('div') as $div) {
            if ($div->getAttribute('id') === '__news_content_root') {
                $root = $div;
                break;
            }
        }

        if (!$root) {
            return [$content];
        }

        $blocks = [];

        foreach ($root->childNodes as $child) {
            if ($child->nodeType === XML_TEXT_NODE && trim($child->nodeValue) === '') {
                continue;
            }

            if ($child->nodeType === XML_COMMENT_NODE) {
                continue;
            }

            if (
                $child->nodeType === XML_ELEMENT_NODE
                && in_array(strtolower($child->nodeName), ['script', 'style'], true)
            ) {
                continue;
            }

            $html = $dom->saveHTML($child);

            if ($html !== false && trim($html) !== '') {
                $blocks[] = trim($html);
            }
        }

        return $blocks ?: [$content];
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
