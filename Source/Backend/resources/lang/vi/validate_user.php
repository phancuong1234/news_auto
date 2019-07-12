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

];
