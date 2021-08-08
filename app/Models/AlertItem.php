<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlertItem extends Model
{
    protected $table = "alertitem";
    protected $fillable = [
        'productalert_id', 'user_id', 'opened', 'opened_at',
    ];
}
