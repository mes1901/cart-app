<?php

namespace App\Http\Controllers\Api;

use App\Actions\Order\CreateOrderAction;
use App\Actions\Order\CreateOrderRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\Order\CreateOrderHttpRequest;
use App\Http\Resources\OrderResource;
use App\Http\Response\ApiResponse;

class OrderController extends Controller
{
    private $createOrderAction;

    public function __construct(CreateOrderAction $createOrderAction)
    {
        $this->createOrderAction = $createOrderAction;
    }

    public function createOrder(CreateOrderHttpRequest $request)
    {
        $response = $this->createOrderAction->execute(
            CreateOrderRequest::fromRequest($request)
        );

        return ApiResponse::success(new OrderResource($response));
    }
}
