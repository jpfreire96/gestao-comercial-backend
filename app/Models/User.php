<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = "user";
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'cpf', 'permission_id',
    ];

    public function scopeGetUser($query, $email)
    {
        return $query->where('email', $email);
    }
}
