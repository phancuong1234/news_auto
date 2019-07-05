<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'list_id_category',
        'id_user',
        'title',
        'short_description',
        'content',
        'image',
        'url_news',
        'name_page_crawled',
        'type',
        'number_view',
        'is_active',
        'date_start',
        'date_end'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
