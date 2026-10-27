<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePkrsPostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }


    /**
     * Prepare data before validation.
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'slug' => $this->slug ?: str($this->title)->slug(),
        ]);
    }


    /**
     * Validation rules.
     */
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
                'nullable',
                'string',
            ],


            'thumbnail' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
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
                'url',
                'max:500',
                'required_if:type,video',
            ],


            'video_cover' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
                'required_if:type,video',
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


    /**
     * Validation messages.
     */
    public function messages(): array
    {
        return [

            'pkrs_category_id.required'
            => 'Kategori wajib dipilih.',

            'pkrs_category_id.exists'
            => 'Kategori tidak ditemukan.',


            'title.required'
            => 'Judul post wajib diisi.',


            'slug.required'
            => 'Slug wajib diisi.',

            'slug.unique'
            => 'Slug sudah digunakan.',


            'thumbnail.image'
            => 'Thumbnail harus berupa gambar.',

            'thumbnail.max'
            => 'Ukuran thumbnail maksimal 2 MB.',


            'type.required'
            => 'Jenis post wajib dipilih.',


            'video.required_if'
            => 'URL video wajib diisi jika jenis post adalah Video.',

            'video.url'
            => 'Format URL video tidak valid.',


            'video_cover.required_if'
            => 'Cover video wajib diupload.',

            'video_cover.image'
            => 'Cover video harus berupa gambar.',

            'video_cover.max'
            => 'Ukuran cover maksimal 2 MB.',


            'published_at.date'
            => 'Tanggal publish tidak valid.',

        ];
    }


    /**
     * Custom attribute names.
     */
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
