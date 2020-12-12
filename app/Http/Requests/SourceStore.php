<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SourceStore extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:100',
            'link' => 'nullable|url|max:255',
            'description' => 'nullable|string|max:255',
            'image' => 'nullable|url|max:100', // not file, image link here
        ];
    }

    public function attributes(): array
    {
        return [
            'image' => 'Image Link',
        ];
    }
}
