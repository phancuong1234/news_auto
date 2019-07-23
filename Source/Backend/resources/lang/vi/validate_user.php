<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */
    'changepass'=>[
        'oldpass'=>[
            'required' =>'xin mời nhập mật khẩu cũ',
            'no-have' =>'mật khẩu cũ không đúng',
        ],
        'password'=>[
            'required' => 'xin mời nhập mật khẩu mới',
            'minlength'=>'Mật khẩu mới phải nhiều hợn 8 kí tự',
        ],
        'repass'=>[
            'required' => 'xin mời xác nhận mật khẩu',
            'equalTo' => 'Xác nhận mật khẩu chưa đúng',
        ],
    ],
    'changeprofile' => [
        'error' => 'Thay đổi thất bại, không được để trống các trường (số điện thoại phải là dãy số 10 kí tự, bắt đầù bằng số 0 và ảnh không được lớn hơn 2MB)',
        'susscess' => 'Thay đổi thành công',
        'fullname' => [
            'validateFullName' => 'Họ và tên chỉ được nhập chữ',
            'required' => 'Mời nhập họ và tên',
            'minlength' => 'Họ và tên phải lớn hơn 8 kí tự',
        ],
        'phone' => [
            'validatePhone' => 'Kiểm tra số điện thoại của bạn (10 kí tự và bắt đầù bằng số 0)',
            'required' => 'Mời nhập số điện thoại',
        ],
        'address' => [
            'required' => 'Mời nhập địa chỉ',
            'minlength' => 'Địa chỉ phải lớn hơn 8 kí tự',
        ],
        'birth_date' => [
            'validateBirthDay'=> 'Ngày sinh chưa chính xác , hãy kiểm tra lại',
            'required' => 'Mời nhập ngày sinh',
        ],
    ],

];
