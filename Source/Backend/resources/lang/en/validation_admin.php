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
    'confirm_del' => 'Are you sure you want to permanently delete this record? Data will be permanently lost.',
    'category' => [
        'required' => 'please enter category name ',
        'minlenght' => 'Category name cannot be less than 5 characters',
        'maxlenght' => 'Category names cannot be greater than 5 characters',
        'no_special_char' => 'Category names do not allow special characters to be entered',
    ],
    'user' => [
        'required' => [
            'username' => 'please enter username',
            'fullname' => 'please enter fullname',
            'email' => 'please enter email',
            'password' => 'please enter password',
            'repass' => 'please enter re-password',
            'id_role'=> 'please choose id_role',
        ],
        'minlength' => [
            'username' => 'username cannot be less than 8 characters',
            'fullname' => 'fullname cannot be less than 8 characters',
            'password' => 'password cannot be less than 8 characters',
            'address' => 'address cannot be less than 10 characters'
        ],
        'email' => [
            'email'=>'Email invalidate',
            'unique'=>'The email already exists in the database',
        ],
        'repass'=>[
            'same'=>'Re-password does not match',
        ],
        'phone'=>[
            'numberic'=>'phone must be number',
            'regex' => 'phone format is incorrect',
        ],
        'image'=>[
            'image' => 'The selected file is not an image file',
            'mimes' => 'The selected file must have the extension : jpeg, png, jpg, gif'
        ],
        'valid_user'=>'The username must start with the word and do not contain special characters',
        'numeric' => 'The number phone must be a number',
    ],
    'new' => [
        'title' => [
            'required' => 'please enter a title',
            'minlenght' => 'title cannot be less than 10 characters',
            'maxlenght' => 'title cannot be greater than 180 characters',
        ],
        'short_description' => [
            'required' => 'please enter description',
            'minlenght' => 'description field cannot be less than 10 characters',
            'maxlenght' => 'description field cannot be greater than 300 characters',
        ],
        'content' => [
            'required' => 'please enter article content',
            'minlenght' => 'article content field cannot be less than 100 characters',
        ],
        'url' => [
            'maxlenght' => 'URL field cannot be greater than 180 characters',
        ],
        'image' => [
            'required' => 'please add photos',
            'mimes' => "The avatar must be a file type: jpeg, png, bmp, gif, svg, jpg.",
            'max' => 'file upload limit is 10 MB',
        ]
    ],
    'chart' => [
        'year' => [
            'required'=> 'this filed can not be null',
            'number' => 'please enter a number'
        ]
    ]
];
