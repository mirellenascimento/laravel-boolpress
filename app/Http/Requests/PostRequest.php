<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
          'title' => ['required', 'string', 'max:255', 'min:3'],
          'image_url' => ['mimes:jpeg,bmp,png', 'max:5000'],
          'description' => ['required'],
          'slug' => [' '],
          'user_id' => [' '],
          'category_id' => [' '],
          'tags' => ['nullable', 'string'],
          'selected_tags' => ['nullable'],
          'new_category' => ['nullable', 'string', 'max:20'],
        ];
    }
}
