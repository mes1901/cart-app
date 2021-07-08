<?php

namespace App\Http\Controllers\Api;

use App\Actions\Product\GetProductAction;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductsResource;
use App\Http\Response\ApiResponse;

class ProductController extends Controller
{
    private $getProductsAction;

    public function __construct(GetProductAction $getProductsAction)
    {
        $this->getProductsAction = $getProductsAction;
    }

    public function getAllProducts()
    {
        $response = $this->getProductsAction->execute();

        return ApiResponse::success(new ProductsResource($response));
    }
}
