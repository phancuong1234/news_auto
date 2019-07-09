<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'username'=>'required|min:8',
            'password'=>'required|min:8',
        ];
    }
    public function messages()
    {
        return [
            'username.required'=>trans('validation_admin.user.required.username'),
            'username.min'=>trans('validation_admin.user.minlenght.username'),

            'password.required'=>trans('validation_admin.user.required.password'),
            'password.min'=>trans('validation_admin.user.minlenght.password'),

        ];
    }
}
