<?php

namespace App\Actions\Order;

use App\Http\Requests\Order\CreateOrderHttpRequest;

class CreateOrderRequest
{
    private $total;
    private $quantity;
    private $products;
    private $isAuth;

    public function __construct( $total, $quantity, $products, $isAuth )
    {
        $this->total = $total;
        $this->quantity = $quantity;
        $this->products = $products;
        $this->isAuth = $isAuth;
    }

    public function getTotal()
    {
        return $this->total;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function getProducts()
    {
        return $this->products;
    }

    public function getIsAuth()
    {
        return $this->isAuth;
    }

    public static function fromRequest(CreateOrderHttpRequest $request)
    {
        return new static(
            $request->get('total'),
            $request->get('quantity'),
            $request->get('products'),
            $request->get('auth')
        );
    }
}