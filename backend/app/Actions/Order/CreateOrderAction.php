<?php

namespace App\Actions\Order;

use App\Repositories\OrderInfoRepository;
use App\Repositories\OrderRepository;
use App\Repositories\UserRepository;

class CreateOrderAction
{
    private $orderRepository;
    private $userRepository;
    private $orderInfoRepository;

    public function __construct(
        OrderRepository $orderRepository,
        UserRepository $userRepository,
        OrderInfoRepository $orderInfoRepository
    ) {
        $this->orderRepository = $orderRepository;
        $this->userRepository = $userRepository;
        $this->orderInfoRepository = $orderInfoRepository;
    }

    public function execute(CreateOrderRequest $request)
    {
        $userId = $request->getIsAuth() ? $this->userRepository->getRegisteredUser()->id :
            $this->userRepository->getUnregisteredUser()->id;

        $newOrder = $this->orderRepository->createOrder($userId, $request->getTotal());


        foreach ($request->getProducts() as $product) {
            $this->orderInfoRepository->addOrderInfo($newOrder->id, $product['id'], $product['quantity'],
                $request->getIsAuth() ? $product['discount_price'] : $product['price'], $product['amount']);
        }

        return new CreateOrderResponse($newOrder->id);
    }
}