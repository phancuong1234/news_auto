<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name_category' => 'required|min:5|max:100',
        ];
    }

    public function messages()
    {
        return [
            'name_category.required' => trans('validation_admin.category.required'),
            'name_category.min' => trans('validation_admin.category.minlenght'),
            'name_category.max' => trans('validation_admin.category.maxlenght'),
        ];
    }
}
