<?php

namespace App\Http\Requests;

use App\Models\PkrsPost;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class StorePkrsPostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Slug selalu dibuat otomatis dan unik, mengikuti perilaku News.
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'slug' => $this->generateUniqueSlug((string) $this->input('title')),
        ]);
    }

    public function rules(): array
    {
        return [
            'pkrs_category_id' => [
                'required',
                'exists:pkrs_categories,id',
            ],

            'title' => [
                'required',
                'string',
                'max:255',
            ],

            'slug' => [
                'required',
                'string',
                'max:255',
                'unique:pkrs_posts,slug',
            ],

            'excerpt' => [
                'nullable',
                'string',
                'max:500',
            ],

            'content' => [
                'required',
                'string',
            ],

            'thumbnail' => [
                'required',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:20480',
            ],

            'type' => [
                'required',
                Rule::in([
                    'image',
                    'gallery',
                    'video',
                ]),
            ],

            'video' => [
                'nullable',
                'required_if:type,video',
                'file',
                'mimes:mp4,webm,ogg,mov',
                'max:51200',
            ],

            'video_cover' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:20480',
            ],

            'featured' => [
                'nullable',
                'boolean',
            ],

            'is_published' => [
                'nullable',
                'boolean',
            ],

            'published_at' => [
                'nullable',
                'date',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'pkrs_category_id.required' => 'Kategori wajib dipilih.',
            'pkrs_category_id.exists' => 'Kategori tidak ditemukan.',

            'title.required' => 'Judul post wajib diisi.',

            'slug.required' => 'Slug wajib diisi.',
            'slug.unique' => 'Slug sudah digunakan.',

            'excerpt.max' => 'Ringkasan maksimal 500 karakter.',

            'content.required' => 'Isi artikel wajib diisi.',

            'thumbnail.required' => 'Thumbnail wajib diupload.',
            'thumbnail.image' => 'Thumbnail harus berupa gambar.',
            'thumbnail.mimes' => 'Format thumbnail harus JPG, JPEG, PNG, atau WEBP.',
            'thumbnail.max' => 'Ukuran thumbnail maksimal 20 MB.',

            'type.required' => 'Jenis post wajib dipilih.',

            'video.required_if' => 'File video wajib diupload jika jenis post adalah Video.',
            'video.file' => 'Video harus berupa file yang valid.',
            'video.mimes' => 'Format video harus MP4, WEBM, OGG, atau MOV.',
            'video.max' => 'Ukuran video maksimal 50 MB.',

            'video_cover.image' => 'Cover video harus berupa gambar.',
            'video_cover.mimes' => 'Format cover video harus JPG, JPEG, PNG, atau WEBP.',
            'video_cover.max' => 'Ukuran cover video maksimal 20 MB.',

            'published_at.date' => 'Tanggal publish tidak valid.',
        ];
    }

    public function attributes(): array
    {
        return [
            'pkrs_category_id' => 'kategori',
            'title' => 'judul',
            'slug' => 'slug',
            'excerpt' => 'ringkasan',
            'content' => 'isi artikel',
            'thumbnail' => 'thumbnail',
            'type' => 'jenis post',
            'video' => 'video',
            'video_cover' => 'cover video',
            'featured' => 'featured',
            'is_published' => 'status publish',
            'published_at' => 'tanggal publish',
        ];
    }

    private function generateUniqueSlug(string $title, ?int $ignoreId = null): string
    {
        $base = Str::slug($title) ?: 'post';
        $slug = $base;
        $counter = 1;

        while (
            PkrsPost::query()
                ->where('slug', $slug)
                ->when($ignoreId, fn ($query) => $query->where('id', '!=', $ignoreId))
                ->exists()
        ) {
            $slug = $base . '-' . $counter;
            $counter++;
        }

        return $slug;
    }
}
