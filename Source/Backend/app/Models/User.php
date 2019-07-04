<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends Authenticatable
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'username',
        'email',
        'fullname',
        'password',
        'birth_date',
        'gender',
        'address',
        'phone',
        'image',
        'is_active',
        'id_role',
        'function',
    ];

    protected $hidden = [
        'remember_token',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function news()
    {
        return $this->hasMany(News::class);
    }
}
