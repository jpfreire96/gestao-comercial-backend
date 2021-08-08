<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SaleItem extends Model
{
    protected $table = "saleitem";
    protected $fillable = [
        'sale_id'
    ];
}
