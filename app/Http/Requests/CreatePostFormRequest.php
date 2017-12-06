<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title'             => 'required|max:255',
            'featured_image'    => 'required|image',
            'category_id'       => 'required',
            'content'           => 'required'
        ];
    }
}
