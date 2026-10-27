<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePkrsPostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'slug' => $this->slug ?: str($this->title)->slug(),
        ]);
    }

    public function rules(): array
    {
        return [

            /*
            |--------------------------------------------------------------------------
            | Kategori
            |--------------------------------------------------------------------------
            */

            'pkrs_category_id' => [
                'required',
                'exists:pkrs_categories,id',
            ],

            /*
            |--------------------------------------------------------------------------
            | Judul
            |--------------------------------------------------------------------------
            */

            'title' => [
                'required',
                'string',
                'max:255',
            ],

            /*
            |--------------------------------------------------------------------------
            | Slug
            |--------------------------------------------------------------------------
            |
            | Slug harus unique, tetapi post yang sedang diedit
            | dikecualikan dari pengecekan unique.
            |
            */

            'slug' => [
                'required',
                'string',
                'max:255',

                Rule::unique('pkrs_posts', 'slug')
                    ->ignore($this->route('pkrs_post')),
            ],

            /*
            |--------------------------------------------------------------------------
            | Excerpt
            |--------------------------------------------------------------------------
            */

            'excerpt' => [
                'nullable',
                'string',
                'max:500',
            ],

            /*
            |--------------------------------------------------------------------------
            | Content
            |--------------------------------------------------------------------------
            */

            'content' => [
                'nullable',
                'string',
            ],

            /*
            |--------------------------------------------------------------------------
            | Thumbnail
            |--------------------------------------------------------------------------
            */

            'thumbnail' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],

            /*
            |--------------------------------------------------------------------------
            | Type
            |--------------------------------------------------------------------------
            */

            'type' => [
                'required',
                Rule::in([
                    'image',
                    'gallery',
                    'video',
                ]),
            ],

            /*
            |--------------------------------------------------------------------------
            | Video
            |--------------------------------------------------------------------------
            */

            'video' => [
                'nullable',
                'url',
                'max:500',
                'required_if:type,video',
            ],

            /*
            |--------------------------------------------------------------------------
            | Video Cover
            |--------------------------------------------------------------------------
            */

            'video_cover' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],

            /*
            |--------------------------------------------------------------------------
            | Featured
            |--------------------------------------------------------------------------
            */

            'featured' => [
                'nullable',
                'boolean',
            ],

            /*
            |--------------------------------------------------------------------------
            | Published
            |--------------------------------------------------------------------------
            */

            'is_published' => [
                'nullable',
                'boolean',
            ],

            /*
            |--------------------------------------------------------------------------
            | Published At
            |--------------------------------------------------------------------------
            */

            'published_at' => [
                'nullable',
                'date',
            ],
        ];
    }

    public function messages(): array
    {
        return [

            /*
            |--------------------------------------------------------------------------
            | Category
            |--------------------------------------------------------------------------
            */

            'pkrs_category_id.required'
            => 'Kategori wajib dipilih.',

            'pkrs_category_id.exists'
            => 'Kategori tidak ditemukan.',

            /*
            |--------------------------------------------------------------------------
            | Title
            |--------------------------------------------------------------------------
            */

            'title.required'
            => 'Judul post wajib diisi.',

            /*
            |--------------------------------------------------------------------------
            | Slug
            |--------------------------------------------------------------------------
            */

            'slug.required'
            => 'Slug wajib diisi.',

            'slug.unique'
            => 'Slug sudah digunakan.',

            /*
            |--------------------------------------------------------------------------
            | Thumbnail
            |--------------------------------------------------------------------------
            */

            'thumbnail.image'
            => 'Thumbnail harus berupa gambar.',

            'thumbnail.max'
            => 'Ukuran thumbnail maksimal 2 MB.',

            /*
            |--------------------------------------------------------------------------
            | Type
            |--------------------------------------------------------------------------
            */

            'type.required'
            => 'Jenis post wajib dipilih.',

            /*
            |--------------------------------------------------------------------------
            | Video
            |--------------------------------------------------------------------------
            */

            'video.required_if'
            => 'URL video wajib diisi jika jenis post adalah Video.',

            'video.url'
            => 'Format URL video tidak valid.',

            /*
            |--------------------------------------------------------------------------
            | Video Cover
            |--------------------------------------------------------------------------
            */

            'video_cover.image'
            => 'Cover video harus berupa gambar.',

            'video_cover.max'
            => 'Ukuran cover maksimal 2 MB.',

            /*
            |--------------------------------------------------------------------------
            | Published At
            |--------------------------------------------------------------------------
            */

            'published_at.date'
            => 'Tanggal publish tidak valid.',
        ];
    }

    public function attributes(): array
    {
        return [

            'pkrs_category_id'
            => 'kategori',

            'title'
            => 'judul',

            'slug'
            => 'slug',

            'excerpt'
            => 'ringkasan',

            'content'
            => 'isi artikel',

            'thumbnail'
            => 'thumbnail',

            'type'
            => 'jenis post',

            'video'
            => 'video',

            'video_cover'
            => 'cover video',

            'featured'
            => 'featured',

            'is_published'
            => 'status publish',

            'published_at'
            => 'tanggal publish',
        ];
    }
}
