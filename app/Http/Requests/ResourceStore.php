<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResourceStore extends FormRequest
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
            'title'    => 'nullable|string|max:100',
            'link'     => 'required|url|max:255',
            'category' => 'nullable|string|max:100',
        ];
    }

    public function attributes()
    {
        return [
            'link' => 'URL',
            'source_id' => 'Source',
        ];
    }
}
