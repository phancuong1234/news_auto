<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Config_RSS_Link extends Model
{
    protected $table = 'config_link_rss';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'name_page',
        'name_cate',
        'parent_id',
    ];
}
