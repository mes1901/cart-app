<?php

namespace App\Http\Requests\Order;

use App\Http\Requests\ApiFormRequest;

final class CreateOrderHttpRequest extends ApiFormRequest
{
    public function rules()
    {
        return [
            'total' => 'required|numeric',
            'quantity' => 'required|min:1|integer',
            'products' => 'required|array|min:1',
            'auth' => 'required|integer',
        ];
    }

    public function getTotal()
    {
        return $this->get('total');
    }

    public function getQuantity()
    {
        return $this->get('quantity');
    }

    public function getProducts()
    {
        return $this->get('products');
    }

    public function getAuth()
    {
        return $this->get('auth');
    }
}