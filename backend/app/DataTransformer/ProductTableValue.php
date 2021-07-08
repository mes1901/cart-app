<?php

namespace App\DataTransformer;

class ProductTableValue
{
    private $id;
    private $name;
    private $price;
    private $discountPrice;

    public function __construct($id, $name, $price, $discountPrice)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->discountPrice = $discountPrice;
    }

    public function id()
    {
        return $this->id;
    }

    public function name()
    {
        return $this->name;
    }

    public function price()
    {
        return $this->price;
    }

    public function discountPrice()
    {
        return $this->discountPrice;
    }
}