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

    'category' => [
        'add' => [
            'success' => 'add successful category',
            'fail' => 'add fail category',
        ],
        'del' => [
            'success' => 'del successful category',
            'fail' => 'del fail category',
        ],
        'edit' => [
            'success' => 'edit successful category',
            'fail' => 'edit fail category',
        ]
    ],
    'news' => [
        'add' => [
            'success' => 'add successful news',
            'fail' => 'add fail news',
        ],
        'del' => [
            'success' => 'del successful news',
            'fail' => 'del fail news',
        ],
        'edit' => [
            'success' => 'edit successful news',
            'fail' => 'edit fail news',
        ],
        'approve' => [
            'success' => 'approved successful news',
            'fail' => 'approved fail news',
        ],
    ],
    'user' => [
        'add' => [
            'success' => 'add successful user',
            'fail' => 'add fail user',
        ],
        'del' => [
            'success' => 'del successful user',
            'fail' => 'del fail user',
        ],
        'edit' => [
            'success' => 'edit successful user',
            'fail' => 'edit fail user',
        ]
    ],
    'crawl' => [
        'crawl-success' => 'successful data scratching',
        'crawl-fail' => 'failed data scratching',
    ],
    'button' => [
        'start' => 'start',
        'cancel' => 'cancel',
    ],
    'confirm_change_status' => 'Do you want to change the status of the record?',
    'update_status_fail' => 'Change the state of the failed record',
    'update_status_success' => 'Change the status of the record successfully',
    'comment' => [
        'add' => [
            'success' => 'add successful comment',
            'fail' => 'add fail comment',
        ],
        'del' => [
            'success' => 'del successful comment',
            'fail' => 'del fail comment',
        ],
        'edit' => [
            'success' => 'edit successful comment',
            'fail' => 'edit fail comment',
        ]
    ],
    'confirm' => [
        'confirm' => 'Would you like to accept this news?',
        'success' => 'accept successful request approval',
        'fail' => 'reject the request approval',
    ],
    'name_chart'=>[
        'user' => 'Total number of users registered by month in this year',
        'useryearago'=>'Total number of users registered',
        'view' => 'Total views of the months in this year',
        'topview' => 'Top 10 article view in this year',
        'topviewchoose' => 'Top article view ',
        'comment' => 'Total comment of the months in this year',
        'commentmonth' => 'Top 10 article comment of this months',
        'article' => 'Total article of the month in this year',
        'articlebycate' => 'Total article order by Category',
        'articlerate' => 'Total article rate by Category',
        'default_col_name' => 'Amount',
        'default_row_name' => 'Month',
        'col_name' => 'Amount',
        'row_name' => 'ID article',
        'row_name_Top_Mod' => 'Mod Username',
        'topMod' => 'Top 10 Mod in this year',
    ],
    'login'=>[
        'success' => 'Login success',
        'lock-user' => 'Your account is locked',
        'wrong-pass' => 'Invalid username or password',
    ],
    'agree_rule' => 'You have not agreed to the terms',
];
