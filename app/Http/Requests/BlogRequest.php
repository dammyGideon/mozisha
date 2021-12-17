<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
            'title'              => 'required|max:255|unique:blogs,title',
            'image'              => 'required|image|max:3000',
            'caption'            => 'nullable|max:255',
            'category'           => 'required|max:255',
            'main_content'       => 'required|max:6000',
            'continue_1'         => 'nullable|max:4000',
            'continue_image_1'   => 'nullable|image|max:3000',
            'caption_1'          => 'nullable|max:255',
            'continue_2'         => 'nullable|max:4000',
            'continue_image_2'   => 'nullable|image|max:3000',
            'caption_2'          => 'nullable|max:255',
            'continue_3'         => 'nullable|max:4000',
            'continue_image_3'   => 'nullable|image|max:3000',
            'caption_3'          => 'nullable|max:255',
            'continue_4'         => 'nullable|max:4000',
            'continue_image_4'   => 'nullable|image|max:3000',
            'caption_4'          => 'nullable|max:255',
            'continue_5'         => 'nullable|max:4000',
            'continue_image_5'   => 'nullable|image|max:3000',
            'caption_5'          => 'nullable|max:255',
            'continue_6'         => 'nullable|max:4000',
            'continue_image_6'   => 'nullable|image|max:3000',
            'caption_6'          => 'nullable|max:255',
            'continue_7'         => 'nullable|max:4000',
            'continue_image_7'   => 'nullable|image|max:3000',
            'caption_7'          => 'nullable|max:255',
            'continue_8'         => 'nullable|max:4000',
            'continue_image_8'   => 'nullable|image|max:3000',
            'caption_8'          => 'nullable|max:255',
            'continue_9'         => 'nullable|max:4000',
            'continue_image_9'   => 'nullable|image|max:3000',
            'caption_9'          => 'nullable|max:255',
            'quote'              => 'nullable|max:1000',
            'quote_by'           => 'nullable|max:255',
            'status'             => 'required|max:255',
        ];
    }
}
