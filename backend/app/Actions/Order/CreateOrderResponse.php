<?php

namespace App\Actions\Order;

class CreateOrderResponse
{
    private $orderId;

    public function __construct($orderId)
    {
        $this->orderId = $orderId;
    }

    public function getOrderId()
    {
        return $this->orderId;
    }
}
