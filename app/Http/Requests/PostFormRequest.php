<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostFormRequest extends FormRequest
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
            'category_id'       => 'required|numeric',
            'user_id'           => 'required',
            'title'             => 'required|string|max:255',
            'slug'              => ['required','string','regex:/^[A-Za-z0-9 ]+$/', Rule::unique('posts', 'slug')->ignore($this->post)],
            'description'       => 'required',
            'image'             => 'nullable|mimes:jpeg,jpg,png|max:2048',
            'is_published'      => 'required',
        ];
    }
}
