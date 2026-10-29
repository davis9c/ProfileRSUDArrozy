<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Concerns\StoresUploads;
use App\Http\Controllers\Controller;
use App\Models\PkrsGallery;
use App\Models\PkrsPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PkrsGalleryController extends Controller
{
    use StoresUploads;

    /**
     * Display a listing of galleries.
     */
    public function index(PkrsPost $post)
    {
        $galleries = $post->galleries()
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('admin.pkrs-galleries.index', [
            'post' => $post,
            'galleries' => $galleries,
        ]);
    }


    /**
     * Show form for creating a new gallery.
     */
    public function create(PkrsPost $post)
    {
        return view(
            'admin.pkrs-galleries.create',
            compact('post')
        );
    }


    /**
     * Store a newly created gallery.
     */
    public function store(Request $request, PkrsPost $post)
    {
        $validated = $request->validate([
            'image' => [
                'required',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:20480',
            ],

            'sort_order' => [
                'nullable',
                'integer',
                'min:0',
            ],
        ]);

        DB::beginTransaction();

        try {
            $image = $this->storeUpload(
                $request->file('image'),
                'pkrs/galleries'
            );

            $sortOrder = $validated['sort_order']
                ?? (($post->galleries()->max('sort_order') ?? 0) + 1);

            PkrsGallery::create([
                'pkrs_post_id' => $post->id,
                'image' => $image,
                'sort_order' => $sortOrder,
            ]);

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();

            if (isset($image)) {
                Storage::disk('public')->delete($image);
            }

            return back()
                ->withInput()
                ->with('error', $e->getMessage());
        }

        return redirect()
            ->route('admin.pkrs-posts.galleries.index', $post)
            ->with('success', 'Gallery berhasil ditambahkan.');
    }


    /**
     * Show form for editing the specified gallery.
     */
    public function edit(
        PkrsPost $post,
        PkrsGallery $gallery
    ) {
        $this->ensureGalleryBelongsToPost(
            $post,
            $gallery
        );


        return view('admin.pkrs-galleries.edit', [
            'post' => $post,
            'gallery' => $gallery,
        ]);
    }


    /**
     * Update the specified gallery.
     */
    public function update(
        Request $request,
        PkrsPost $post,
        PkrsGallery $gallery
    ) {
        $this->ensureGalleryBelongsToPost(
            $post,
            $gallery
        );


        $request->validate([
            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:20480',
            ],

            'sort_order' => [
                'nullable',
                'integer',
                'min:0',
            ],
        ], [
            'image.image' => 'File harus berupa gambar.',
            'image.mimes' => 'Format gambar harus JPG, JPEG, PNG, atau WEBP.',
            'image.max' => 'Ukuran gambar maksimal 20 MB.',

            'sort_order.integer' => 'Urutan harus berupa angka.',
            'sort_order.min' => 'Urutan tidak boleh kurang dari 0.',
        ]);


        DB::beginTransaction();

        try {

            $oldImage = $gallery->image;


            $data = [
                'sort_order' => $request->input(
                    'sort_order',
                    $gallery->sort_order
                ),
            ];


            if ($request->hasFile('image')) {

                $data['image'] = $this->storeUpload(
                    $request->file('image'),
                    'pkrs/galleries'
                );
            }


            $gallery->update($data);


            DB::commit();


            /*
            |--------------------------------------------------------------------------
            | Hapus gambar lama setelah database berhasil diupdate
            |--------------------------------------------------------------------------
            */

            if (
                $request->hasFile('image')
                && $oldImage
            ) {

                Storage::disk('public')
                    ->delete($oldImage);
            }


            return redirect()
                ->route(
                    'admin.pkrs-posts.galleries.index',
                    $post
                )
                ->with(
                    'success',
                    'Gallery berhasil diperbarui.'
                );
        } catch (\Throwable $e) {

            DB::rollBack();


            if (
                isset($data['image'])
                && $data['image']
                !== $gallery->image
            ) {

                Storage::disk('public')
                    ->delete($data['image']);
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
     * Remove the specified gallery.
     */
    public function destroy(
        PkrsPost $post,
        PkrsGallery $gallery
    ) {
        $this->ensureGalleryBelongsToPost(
            $post,
            $gallery
        );


        DB::beginTransaction();

        try {

            $image = $gallery->image;


            $gallery->delete();


            DB::commit();


            if ($image) {

                Storage::disk('public')
                    ->delete($image);
            }


            return redirect()
                ->route(
                    'admin.pkrs-posts.galleries.index',
                    $post
                )
                ->with(
                    'success',
                    'Gallery berhasil dihapus.'
                );
        } catch (\Throwable $e) {

            DB::rollBack();


            return back()
                ->with(
                    'error',
                    $e->getMessage()
                );
        }
    }


    /**
     * Make sure gallery belongs to the selected post.
     */
    private function ensureGalleryBelongsToPost(
        PkrsPost $post,
        PkrsGallery $gallery
    ): void {
        abort_unless(
            $gallery->pkrs_post_id === $post->id,
            404
        );
    }
}
