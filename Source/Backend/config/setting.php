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
        'dan_tri_page' => 'https://dantri.com.vn/',
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
    ]
];
