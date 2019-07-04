<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RSS extends Model
{
    protected $table = 'news_rss';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'name_page',
        'link_page',
        'category',
        'sub_category',
        'title',
        'description',
        'date_start',
        'date_end',
        'active'
    ];
}
