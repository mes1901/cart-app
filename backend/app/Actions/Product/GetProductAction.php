<?php

namespace App\Actions\Product;

use App\Repositories\ProductRepository;

class GetProductAction
{
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function execute()
    {
        $products = $this->productRepository->getAllProducts();

        return $products;
    }
}