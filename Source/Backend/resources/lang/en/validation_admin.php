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
];
