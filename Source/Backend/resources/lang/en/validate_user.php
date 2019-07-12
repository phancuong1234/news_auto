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
            'required' =>'please enter old password',
            'no-have' =>'old password not correct',
        ],
        'password'=>[
            'required' => 'plesase enter new password',
            'minlength'=>'New password must be have more 8 characters',
        ],
        'repass'=>[
            'required' => 'plesase enter Re password',
            'equalTo' => 'Re password must be like filed Password',
        ],
    ],

];
