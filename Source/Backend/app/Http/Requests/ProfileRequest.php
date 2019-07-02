<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'fullname'=>'min:8|max:50',
            'phone'=>'numeric',
            'address'=>'min:10|max:200',
            'file' => 'nullable|mimes:jpeg,png,bmp,gif,svg,jpg|max:10000',
        ];
    }
    public function messages()
    {
        return [
            'fullname.min'=>trans('validation_admin.user.maxlenght.fullname'),
            'fullname.max'=>trans('validation_admin.user.minlenght.fullname'),

            'phone.numeric'=>trans('validation_admin.user.numeric'),

            'address.min'=>trans('validation_admin.user.minlenght.address'),
            'address.max'=>trans('validation_admin.user.maxlenght.address'),

            'file.mimes' => trans('validation_admin.user.image.mimes'),
            'file.max' => trans('validation_admin.user.image.max'),
        ];
    }
}
