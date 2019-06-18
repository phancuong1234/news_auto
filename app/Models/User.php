<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
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

    public function roles()
    {
        return $this->belongsTo(Role::class);
    }
}
