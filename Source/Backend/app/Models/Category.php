<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'name_category',
        'url_cate',
        'name_page_crawled',
        'type',
        'is_active'
    ];

    public function news()
    {
        return $this->hasMany(News::class);
    }

}
