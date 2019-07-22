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
    'changepass' => [
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
    'changeprofile' => [
        'error' => 'Changes failed, please complete the fields (phone numbers must be numbers or image not correct)',
        'susscess' => 'Changes Susscess',
        'fullname' => [
            'validateFullName' => 'Full name is only entered word',
            'required' => 'Please enter Full name',
            'minlength' => 'Full name must be more than 8 characters',
        ],
        'phone' => [
            'validatePhone' => 'Please check your number phone (phone must have 10 characters and begin with 0)',
            'required' => 'Please enter phone number',
        ],
        'address' => [
            'required ' => 'Please enter address',
            'minlength' => 'Address must be more than 8 characters',
        ],
        'birth_date' => [
            'validateBirthDay'=> 'Please check your birthday',
            'required' => 'Please enter your birthday'
        ],

    ],

];
