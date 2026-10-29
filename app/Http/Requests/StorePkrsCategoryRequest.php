<?php

namespace App\Http\Requests;

use App\Models\PkrsCategory;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StorePkrsCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'slug' => $this->generateUniqueSlug((string) $this->input('name')),
        ]);
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:100',
            'slug' => 'required|string|max:255|unique:pkrs_categories,slug',
            'icon' => 'nullable|string|max:100',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama kategori wajib diisi.',
            'name.max' => 'Nama kategori maksimal 100 karakter.',
            'slug.unique' => 'Slug kategori sudah digunakan.',
        ];
    }

    private function generateUniqueSlug(string $name, ?int $ignoreId = null): string
    {
        $base = Str::slug($name) ?: 'kategori';
        $slug = $base;
        $counter = 1;

        while (
            PkrsCategory::query()
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
