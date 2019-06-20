<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'username'=>'required|min:8',
            'fullname'=>'required|min:8',
            'password'=>'required|min:8',
            'repass'=>'required|same:password',
            'phone'=>'nullable|numeric|regex:/(0)[0-9]{9}/',
            'address' => 'nullable|min:10',
            'image' =>'nullable|image|mimes:jpeg,png,jpg,gif'
        ];
    }
    public function messages()
    {
        return [
            'username.required'=>trans('validation_admin.user.required.username'),
            'username.min'=>trans('validation_admin.user.minlenght.username'),

            'fullname.required'=>trans('validation_admin.user.required.fullname'),
            'fullname.min'=>trans('validation_admin.user.minlenght.fullname'),

            'password.required'=>trans('validation_admin.user.required.password'),
            'password.min'=>trans('validation_admin.user.minlenght.password'),

            're-pass.required'=>trans('validation_admin.user.required.repass'),
            're-pass.same'=>trans('validation_admin.user.re-pass.same'),

            'phone.numberic' =>trans('validation_admin.user.phone.numberic') ,
            'phone.regex' => trans('validation_admin.user.phone.regex'),

            'address'=> trans('validation_admin.user.minlenght.address'),

            'image.image' => trans('validation_admin.user.image.image'),
            'image.mines' =>trans('validation_admin.user.image.mines'),
        ];
    }
}
