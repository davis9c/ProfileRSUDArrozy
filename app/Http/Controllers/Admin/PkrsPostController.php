<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Concerns\StoresUploads;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePkrsPostRequest;
use App\Http\Requests\UpdatePkrsPostRequest;
use App\Models\PkrsCategory;
use App\Models\PkrsPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PkrsPostController extends Controller
{
    use StoresUploads;

    /**
     * Display a listing of posts.
     */
    public function index(Request $request)
    {
        $posts = PkrsPost::with('category')
            ->when(
                $request->filled('search'),
                fn ($query) => $query->where('title', 'like', '%' . $request->search . '%')
            )
            ->when(
                $request->filled('type'),
                fn ($query) => $query->where('type', $request->type)
            )
            ->when(
                $request->filled('status'),
                function ($query) use ($request) {
                    if ($request->status === 'published') {
                        $query->where('is_published', true);
                    } elseif ($request->status === 'draft') {
                        $query->where('is_published', false);
                    }
                }
            )
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.pkrs-posts.index', compact('posts'));
    }

    /**
     * Show form create.
     */
    public function create()
    {
        $categories = PkrsCategory::orderBy('name')->get();

        return view('admin.pkrs-posts.create', compact('categories'));
    }

    public function store(StorePkrsPostRequest $request)
    {
        $data = $request->validated();
        $storedFiles = [];

        DB::beginTransaction();

        try {
            if ($request->hasFile('thumbnail')) {
                $data['thumbnail'] = $this->storeUpload(
                    $request->file('thumbnail'),
                    'pkrs/posts/thumbnails'
                );
                $storedFiles[] = $data['thumbnail'];
            }

            if ($data['type'] === 'video' && $request->hasFile('video')) {
                $data['video'] = $this->storeUpload(
                    $request->file('video'),
                    'pkrs/posts/videos'
                );
                $storedFiles[] = $data['video'];
            } else {
                $data['video'] = null;
            }

            if ($data['type'] === 'video' && $request->hasFile('video_cover')) {
                $data['video_cover'] = $this->storeUpload(
                    $request->file('video_cover'),
                    'pkrs/posts/video-covers'
                );
                $storedFiles[] = $data['video_cover'];
            } else {
                $data['video_cover'] = null;
            }

            $data['featured'] = $request->boolean('featured');
            $data['is_published'] = $request->boolean('is_published');

            if ($data['is_published']) {
                $data['published_at'] = $data['published_at'] ?? now();
            } else {
                $data['published_at'] = null;
            }

            $data['excerpt'] = trim((string) ($data['excerpt'] ?? ''))
                ?: Str::limit(strip_tags($data['content']), 500);

            $post = PkrsPost::create($data);

            DB::commit();

            if ($post->type === 'gallery') {
                return redirect()
                    ->route('admin.pkrs-posts.galleries.index', $post)
                    ->with('success', 'Post berhasil dibuat. Silakan upload gallery.');
            }

            return redirect()
                ->route('admin.pkrs-posts.index')
                ->with('success', 'Post PKRS berhasil ditambahkan.');
        } catch (\Throwable $e) {
            DB::rollBack();

            if ($storedFiles !== []) {
                Storage::disk('public')->delete($storedFiles);
            }

            return back()
                ->withInput()
                ->with('error', $e->getMessage());
        }
    }

    /**
     * Preview post (AJAX).
     */
    public function show(PkrsPost $pkrsPost)
    {
        $pkrsPost->load(['category', 'galleries']);

        return response()->json([
            'id' => $pkrsPost->id,
            'title' => $pkrsPost->title,
            'category' => $pkrsPost->category?->name,
            'excerpt' => $pkrsPost->excerpt,
            'content' => $pkrsPost->content,
            'thumbnail' => $pkrsPost->thumbnail_url,
            'video' => $pkrsPost->video_url,
            'video_cover' => $pkrsPost->video_cover_url,
            'type' => ucfirst($pkrsPost->type),
            'featured' => $pkrsPost->featured,
            'published' => $pkrsPost->is_published,
            'published_at' => optional($pkrsPost->published_at)?->format('d M Y H:i'),
            'galleries' => $pkrsPost->galleries->map(
                fn ($gallery) => $gallery->image_url
            )->values(),
        ]);
    }

    /**
     * Edit post.
     */
    public function edit(PkrsPost $pkrsPost)
    {
        $pkrsPost->load('category');

        $categories = PkrsCategory::orderBy('name')->get();

        return view('admin.pkrs-posts.edit', [
            'post' => $pkrsPost,
            'categories' => $categories,
        ]);
    }

    /**
     * Update post.
     */
    public function update(UpdatePkrsPostRequest $request, PkrsPost $pkrsPost)
    {
        $data = $request->validated();
        $storedFiles = [];

        if ($data['type'] === 'video' && ! $request->hasFile('video') && ! $pkrsPost->video) {
            return back()
                ->withInput()
                ->withErrors(['video' => 'File video wajib diupload jika jenis post adalah Video.']);
        }

        $oldThumbnail = $pkrsPost->thumbnail;
        $oldVideo = $pkrsPost->video;
        $oldVideoCover = $pkrsPost->video_cover;

        DB::beginTransaction();

        try {
            if ($request->hasFile('thumbnail')) {
                $data['thumbnail'] = $this->storeUpload(
                    $request->file('thumbnail'),
                    'pkrs/posts/thumbnails'
                );
                $storedFiles[] = $data['thumbnail'];
            } else {
                unset($data['thumbnail']);
            }

            if ($data['type'] === 'video' && $request->hasFile('video')) {
                $data['video'] = $this->storeUpload(
                    $request->file('video'),
                    'pkrs/posts/videos'
                );
                $storedFiles[] = $data['video'];
            } elseif ($data['type'] !== 'video') {
                $data['video'] = null;
            }

            if ($data['type'] === 'video' && $request->hasFile('video_cover')) {
                $data['video_cover'] = $this->storeUpload(
                    $request->file('video_cover'),
                    'pkrs/posts/video-covers'
                );
                $storedFiles[] = $data['video_cover'];
            } elseif ($data['type'] !== 'video') {
                $data['video_cover'] = null;
            }

            $data['featured'] = $request->boolean('featured');
            $data['is_published'] = $request->boolean('is_published');

            if ($data['is_published']) {
                $data['published_at'] = $data['published_at'] ?? now();
            } else {
                $data['published_at'] = null;
            }

            $data['excerpt'] = trim((string) ($data['excerpt'] ?? ''))
                ?: Str::limit(strip_tags($data['content']), 500);

            $pkrsPost->update($data);

            DB::commit();

            if (isset($data['thumbnail']) && $oldThumbnail && $oldThumbnail !== $data['thumbnail']) {
                Storage::disk('public')->delete($oldThumbnail);
            }

            if ($oldVideo && array_key_exists('video', $data) && $oldVideo !== $data['video']) {
                Storage::disk('public')->delete($oldVideo);
            }

            if ($oldVideoCover && array_key_exists('video_cover', $data) && $oldVideoCover !== $data['video_cover']) {
                Storage::disk('public')->delete($oldVideoCover);
            }

            if ($pkrsPost->type === 'gallery') {
                return redirect()
                    ->route('admin.pkrs-posts.galleries.index', $pkrsPost)
                    ->with('success', 'Post berhasil diperbarui. Silakan kelola gallery.');
            }

            return redirect()
                ->route('admin.pkrs-posts.index')
                ->with('success', 'Post PKRS berhasil diperbarui.');
        } catch (\Throwable $e) {
            DB::rollBack();

            if ($storedFiles !== []) {
                Storage::disk('public')->delete($storedFiles);
            }

            return back()
                ->withInput()
                ->with('error', $e->getMessage());
        }
    }

    /**
     * Toggle post publish status.
     */
    public function togglePublish(Request $request, PkrsPost $pkrsPost)
    {
        try {
            $pkrsPost->is_published = ! $pkrsPost->is_published;

            if ($pkrsPost->is_published && empty($pkrsPost->published_at)) {
                $pkrsPost->published_at = now();
            }

            if (! $pkrsPost->is_published) {
                $pkrsPost->published_at = null;
            }

            $pkrsPost->save();

            $message = $pkrsPost->is_published
                ? 'Post berhasil ditayangkan.'
                : 'Post berhasil disembunyikan sementara.';

            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'is_published' => $pkrsPost->is_published,
                    'published_at' => optional($pkrsPost->published_at)->format('d M Y H:i'),
                    'message' => $message,
                ]);
            }

            return back()->with('success', $message);
        } catch (\Throwable $e) {
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => $e->getMessage(),
                ], 500);
            }

            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Delete post.
     */
    public function destroy(PkrsPost $pkrsPost)
    {
        DB::beginTransaction();

        try {
            $thumbnail = $pkrsPost->thumbnail;
            $video = $pkrsPost->video;
            $videoCover = $pkrsPost->video_cover;

            $galleryImages = $pkrsPost->galleries()
                ->pluck('image')
                ->all();

            $pkrsPost->galleries()->delete();
            $pkrsPost->delete();

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();

            return back()->with(
                'error',
                'Gagal menghapus post: ' . $e->getMessage()
            );
        }

        try {
            $files = array_filter(array_merge(
                [$thumbnail, $video, $videoCover],
                $galleryImages
            ));

            if ($files !== []) {
                Storage::disk('public')->delete($files);
            }
        } catch (\Throwable $e) {
            logger()->warning(
                'Gagal menghapus file post PKRS: ' . $e->getMessage()
            );
        }

        return redirect()
            ->route('admin.pkrs-posts.index')
            ->with('success', 'Post PKRS berhasil dihapus.');
    }
}
