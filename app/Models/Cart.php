<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'cart';
    protected $primaryKey = 'id';
    protected $fillable = [
        'session_id',
        'user_id',
        'product_id',
        'quantity',
        'price',
        'total',
    ];
}
