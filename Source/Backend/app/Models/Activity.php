<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $table = 'activities';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'id_user',
        'id_news',
        'content',
        'type_active',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
