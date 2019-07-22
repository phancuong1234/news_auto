<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Category extends Model
{
    use Sluggable;

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
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name_category'
            ]
        ];
    }
}
