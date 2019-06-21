<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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

    public function rules()
    {
        return [
            'title' => 'required|min:10|max:180',
            'short_description' => 'required|min:10|max:300',
            'content' => 'required|min:100',
            'image' => 'required|mimes:jpeg,png,bmp,gif,svg,jpg|max:10000',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => trans('validation_admin.new.title.required'),
            'title.min' => trans('validation_admin.new.title.minlenght'),
            'title.max' => trans('validation_admin.new.title.maxlenght'),
            'short_description.required' => trans('validation_admin.new.short_description.required'),
            'short_description.min' => trans('validation_admin.new.short_description.minlenght'),
            'short_description.max' => trans('validation_admin.new.short_description.maxlenght'),
            'content.required' => trans('validation_admin.new.content.required'),
            'content.min' => trans('validation_admin.new.content.minlenght'),
            'image.required' => trans('validation_admin.new.image.required'),
            'image.mimes' => trans('validation_admin.new.image.mimes'),
            'image.max' => trans('validation_admin.new.image.max'),
        ];
    }
}
