<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderInfo extends Model
{
    protected $table = 'orders_info';

    protected $fillable = ['order_id', 'product_id', 'quantity', 'price', 'amount'];
}
