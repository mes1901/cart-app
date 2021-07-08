<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $appends = ['discount_price'];

    protected $attributes = ['id', 'name', 'price'];

    public function getDiscountPriceAttribute()
    {
        return $this->price - $this->price * 0.1;
    }
}
