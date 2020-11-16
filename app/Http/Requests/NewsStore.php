<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsStore extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string|min:5|max:150',
            'image' => 'file|mimes:gif,jpeg,jpg,png|max:500',
            'description' => 'required|string|min:50|max:255',
            'content' => 'required|string|min:150',
            'source_id' => 'required|integer|exists:App\Models\Source,id',
            'category_id' => 'required|integer|exists:App\Models\Category,id',
        ];
    }

    public function attributes()
    {
        return [
            'category_id' => 'Category',
            'source_id' => 'Source',
        ];
    }
}
