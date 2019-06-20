<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:8',
            'repass'=>'required|same:password',
        ];
    }
    public function messages()
    {
        return [
            'username.required'=>trans('validation_admin.user.required.username'),
            'username.min'=>trans('validation_admin.user.minlenght.username'),

            'fullname.required'=>trans('validation_admin.user.required.fullname'),
            'fullname.min'=>trans('validation_admin.user.minlenght.fullname'),

            'email.required'=>trans('validation_admin.user.required.email'),
            'email.email'=>trans('validation_admin.user.email.email'),
            'email.unique'=>trans('validation_admin.user.email.unique'),

            'password.required'=>trans('validation_admin.user.required.password'),
            'password.min'=>trans('validation_admin.user.minlenght.password'),

            're-pass.required'=>trans('validation_admin.user.required.re-pass'),
            're-pass.same'=>trans('validation_admin.user.re-pass.same'),
        ];
    }
}
