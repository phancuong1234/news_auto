<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'id_news',
        'id_user',
        'content',
        'is_active',
    ];

    public function news()
    {
        return $this->belongsTo(News::class);
    }
}
