<?php

namespace App\Repositories;

use App\DataTransformer\ProductTableValue;
use App\Models\Product;

class ProductRepository
{
    public function getAllProducts()
    {
        $res = Product::all();

        return $res->map(function($item) {
                return new ProductTableValue(
                    $item->id,
                    $item->name,
                    $item->price,
                    $item->discount_price
                );
            });
    }
}