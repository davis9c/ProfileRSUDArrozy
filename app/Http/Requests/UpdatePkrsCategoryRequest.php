<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePkrsCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'max:100'],

            'slug' => [
                'required',
                Rule::unique('pkrs_categories', 'slug')
                    ->ignore($this->route('pkrs_category')->id),
            ],

            'icon' => ['nullable', 'string', 'max:100'],
        ];
    }
}
