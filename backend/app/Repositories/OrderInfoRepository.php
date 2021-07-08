<?php

namespace App\Repositories;

use App\Models\OrderInfo;

class OrderInfoRepository
{
    public function addOrderInfo($orderId, $productId, $quantity, $price, $amount)
    {
        OrderInfo::create(
            [
                'order_id' => $orderId,
                'product_id' => $productId,
                'quantity' => $quantity,
                'price' => $price,
                'amount' => $amount
            ]
        );
    }
}