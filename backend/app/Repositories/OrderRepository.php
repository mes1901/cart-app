<?php

namespace App\Repositories;

use App\Models\Order;

class OrderRepository
{
    public function createOrder($userId, $total)
    {
        return Order::create([
            'user_id' => $userId,
            'total_amount' => $total
        ]);
    }
}