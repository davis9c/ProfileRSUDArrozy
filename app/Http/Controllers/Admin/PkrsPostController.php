<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PkrsPost;
use App\Models\PkrsCategory;
use Illuminate\Http\Request;
use App\Http\Requests\StorePkrsPostRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Http\Requests\UpdatePkrsPostRequest;

class PkrsPostController extends Controller
{
    /**
     * Display a listing of posts.
     */
    public function index()
    {
        $posts = PkrsPost::with('category')
            ->latest()
            ->paginate(10);

        // dd($posts->first()->toArray());

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
        DB::beginTransaction();

        try {

            $data = $request->validated();



            /*
        |--------------------------------------------------------------------------
        | Upload Thumbnail
        |--------------------------------------------------------------------------
        */

            if ($request->hasFile('thumbnail')) {

                $data['thumbnail'] =
                    $request
                    ->file('thumbnail')
                    ->store(
                        'pkrs/posts/thumbnails',
                        'public'
                    );
            }



            /*
        |--------------------------------------------------------------------------
        | Upload Video Cover
        |--------------------------------------------------------------------------
        */

            if ($request->hasFile('video_cover')) {

                $data['video_cover'] =
                    $request
                    ->file('video_cover')
                    ->store(
                        'pkrs/posts/video-covers',
                        'public'
                    );
            }



            /*
        |--------------------------------------------------------------------------
        | Boolean
        |--------------------------------------------------------------------------
        */

            $data['featured'] =
                $request->boolean('featured');


            $data['is_published'] =
                $request->boolean('is_published');



            /*
        |--------------------------------------------------------------------------
        | Publish Date
        |--------------------------------------------------------------------------
        */

            if (
                $data['is_published']
                &&
                empty($data['published_at'])
            ) {

                $data['published_at'] = now();
            }



            /*
        |--------------------------------------------------------------------------
        | Remove Video Data
        |--------------------------------------------------------------------------
        */

            if ($data['type'] !== 'video') {

                $data['video'] = null;

                $data['video_cover'] = null;
            }



            /*
        |--------------------------------------------------------------------------
        | Create Post
        |--------------------------------------------------------------------------
        */

            $post = PkrsPost::create($data);



            DB::commit();



            /*
        |--------------------------------------------------------------------------
        | Redirect Gallery
        |--------------------------------------------------------------------------
        */

            if ($post->type === 'gallery') {

                return redirect()
                    ->route(
                        'admin.pkrs-posts.galleries.index',
                        $post->id
                    )
                    ->with(
                        'success',
                        'Post berhasil dibuat. Silakan upload gallery.'
                    );
            }



            return redirect()
                ->route('admin.pkrs-posts.index')
                ->with(
                    'success',
                    'Post PKRS berhasil ditambahkan.'
                );
        } catch (\Throwable $e) {


            DB::rollBack();



            if (isset($data['thumbnail'])) {

                Storage::disk('public')
                    ->delete($data['thumbnail']);
            }



            if (isset($data['video_cover'])) {

                Storage::disk('public')
                    ->delete($data['video_cover']);
            }



            return back()
                ->withInput()
                ->with(
                    'error',
                    $e->getMessage()
                );
        }
    }


    /**
     * Display detail post.
     */
    /**
     * Preview post (AJAX)
     */
    public function show(PkrsPost $pkrsPost)
    {
        $start = microtime(true);

        $pkrsPost->load('category');

        $response = [
            'id'           => $pkrsPost->id,
            'title'        => $pkrsPost->title,
            'category'     => $pkrsPost->category?->name,
            'excerpt'      => $pkrsPost->excerpt,
            'content'      => $pkrsPost->content,
            'thumbnail'    => $pkrsPost->thumbnail
                ? asset('storage/' . $pkrsPost->thumbnail)
                : null,
            'type'         => ucfirst($pkrsPost->type),
            'featured'     => $pkrsPost->featured,
            'published'    => $pkrsPost->is_published,
            'published_at' => optional($pkrsPost->published_at)?->format('d M Y H:i'),
        ];

        logger('SHOW POST : ' . round((microtime(true) - $start) * 1000, 2) . ' ms');

        return response()->json($response);
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
    /**
     * Update post.
     */
    public function update(UpdatePkrsPostRequest $request, PkrsPost $pkrsPost)
    {
        DB::beginTransaction();

        try {

            $data = $request->validated();

            /*
        |--------------------------------------------------------------------------
        | Simpan file lama
        |--------------------------------------------------------------------------
        */

            $oldThumbnail = $pkrsPost->thumbnail;
            $oldVideoCover = $pkrsPost->video_cover;

            /*
        |--------------------------------------------------------------------------
        | Upload Thumbnail Baru
        |--------------------------------------------------------------------------
        */

            if ($request->hasFile('thumbnail')) {

                $data['thumbnail'] = $request
                    ->file('thumbnail')
                    ->store(
                        'pkrs/posts/thumbnails',
                        'public'
                    );
            } else {

                // Jangan hapus thumbnail lama dari data update
                unset($data['thumbnail']);
            }

            /*
        |--------------------------------------------------------------------------
        | Upload Video Cover Baru
        |--------------------------------------------------------------------------
        */

            if ($request->hasFile('video_cover')) {

                $data['video_cover'] = $request
                    ->file('video_cover')
                    ->store(
                        'pkrs/posts/video-covers',
                        'public'
                    );
            } else {

                // Pertahankan cover lama
                unset($data['video_cover']);
            }

            /*
        |--------------------------------------------------------------------------
        | Boolean
        |--------------------------------------------------------------------------
        */

            $data['featured'] =
                $request->boolean('featured');

            $data['is_published'] =
                $request->boolean('is_published');

            /*
        |--------------------------------------------------------------------------
        | Publish Date
        |--------------------------------------------------------------------------
        */

            if (
                $data['is_published']
                && empty($data['published_at'])
            ) {

                $data['published_at'] = now();
            }

            /*
        |--------------------------------------------------------------------------
        | Jika tidak publish
        |--------------------------------------------------------------------------
        */

            if (!$data['is_published']) {

                $data['published_at'] = null;
            }

            /*
        |--------------------------------------------------------------------------
        | Jika bukan video
        |--------------------------------------------------------------------------
        */

            if ($data['type'] !== 'video') {

                $data['video'] = null;
                $data['video_cover'] = null;
            }

            /*
        |--------------------------------------------------------------------------
        | Update Post
        |--------------------------------------------------------------------------
        */

            $pkrsPost->update($data);

            DB::commit();

            /*
        |--------------------------------------------------------------------------
        | Hapus file lama setelah update berhasil
        |--------------------------------------------------------------------------
        */

            if (
                isset($data['thumbnail'])
                && $oldThumbnail
                && $oldThumbnail !== $data['thumbnail']
            ) {

                Storage::disk('public')
                    ->delete($oldThumbnail);
            }

            if (
                isset($data['video_cover'])
                && $oldVideoCover
                && $oldVideoCover !== $data['video_cover']
            ) {

                Storage::disk('public')
                    ->delete($oldVideoCover);
            }

            /*
        |--------------------------------------------------------------------------
        | Jika type berubah dari video
        |--------------------------------------------------------------------------
        */

            if (
                $pkrsPost->type !== 'video'
                && $oldVideoCover
                && !isset($data['video_cover'])
            ) {

                Storage::disk('public')
                    ->delete($oldVideoCover);
            }

            /*
        |--------------------------------------------------------------------------
        | Gallery
        |--------------------------------------------------------------------------
        */

            if ($pkrsPost->type === 'gallery') {

                return redirect()
                    ->route(
                        'admin.pkrs-posts.galleries.index',
                        $pkrsPost->id
                    )
                    ->with(
                        'success',
                        'Post berhasil diperbarui. Silakan kelola gallery.'
                    );
            }

            return redirect()
                ->route('admin.pkrs-posts.index')
                ->with(
                    'success',
                    'Post PKRS berhasil diperbarui.'
                );
        } catch (\Throwable $e) {

            DB::rollBack();

            /*
        |--------------------------------------------------------------------------
        | Hapus upload baru jika update gagal
        |--------------------------------------------------------------------------
        */

            if (
                isset($data['thumbnail'])
                && $data['thumbnail'] !== $pkrsPost->thumbnail
            ) {

                Storage::disk('public')
                    ->delete($data['thumbnail']);
            }

            if (
                isset($data['video_cover'])
                && $data['video_cover'] !== $pkrsPost->video_cover
            ) {

                Storage::disk('public')
                    ->delete($data['video_cover']);
            }

            return back()
                ->withInput()
                ->with(
                    'error',
                    $e->getMessage()
                );
        }
    }


    /**
     * Delete post.
     */
    public function destroy(PkrsPost $pkrsPost)
    {
        //
    }
}
