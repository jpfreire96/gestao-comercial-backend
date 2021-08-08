<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $table = "sale";
    protected $fillable = [
        'user_id',
    ];
}
