<?php
return [
    'str_default' => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
    'is_active' => [
        'active' => 1,
        'lock' => 0,
        'pending' => 2,
    ],
    'role' => [
        'admin' => 1,
        'mod' => 2,
        'editor' => 3,
        'user' => 4,
    ],
    'max_time_request' => 20000,
    'url_crawl' => [
        'name' => 'Báo Dân Trí',
        'dan_tri_page' => 'http://dantri.com.vn/',
        'dan_tri' => 'dantri.com.vn',
    ],
    'url_denine' => [
        'dan_tri' => 'trangchu.rss',
    ],
    'detect_name_crawl' => [
        'name_1' => 'Du lịch',
        'name_2' => 'Video',
    ],
    'paginate' => 10,
    'search_by' => [
        'pending' => 'pending',
        'active' => 'active',
    ],
    'URL_image' => [
        'url_crawl_dantri' => 'icdn.dantri.com.vn',
        'type_url' => [
            'crawl' => 1,
            'of_server' => 0,
        ],
    ],
    'type_news' => [
        'crawl' => 1,
        'handwritten' => 0
    ],
    'type_preview' => [
        'preview_of_news_pending' => 'news_pending_preview',
        'preview_of_news' => 'news_preview',
    ],
    'function' => [
        'full'=> 000,
        'cut' => 1,
        'add' => 0,
        'edit'=> 1,
        'del' => 2,
        'allow' => 1,
        'denie' => 0,
    ],
    'viewUser' => [
        'paginate-cate' => 9,
        'paginate-new' => 4,
        'limit'=>1,
        'limit-top-view'=>8,
        'limit-title'=>6,
        'limit-list-new'=>50,
        'limit-list-id-new'=>3,
        'limit-show-cmt'=>5,
        'id-video'=>1,
        'paginate-search' => 8,
        'paginate-all-new-cate' => 6,
        'paginate-new-cate' => 4,
        'limit_same_cate' => 9,
        'show_news_same_cate' => 3
    ],
    'chart'=>[
        'limit-top-10'=>10,
        'isset-month'=>0,
    ],
    'type_active' => [
        'news' => [
            'add' => 1,
            'edit' => 2,
            'delete' => 3,
            'crawl' => 4,
        ],
    ],
    'type_img' => [
        'img_of_serve' => 'images-'
    ]
];
