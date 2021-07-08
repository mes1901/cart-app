<?php

namespace App\Http\Resources;

use App\Contracts\ApiResponse;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource implements ApiResponse
{
    public function toArray($request)
    {
        return [
            'id' => $this->getOrderId()
        ];
    }
}