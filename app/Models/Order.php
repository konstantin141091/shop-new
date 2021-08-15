<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $fillable = [
        'session_id',
        'user_id',
        'name',
        'phone',
        'email',
        'location',
        'address',
        'delivery_method',
        'comment',
        'status',
        'delivery_cost',
        'total_price'
    ];
}
