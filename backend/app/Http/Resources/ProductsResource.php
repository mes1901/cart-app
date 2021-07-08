<?php

namespace App\Http\Resources;

use App\Contracts\ApiResponse;
use App\DataTransformer\ProductTableValue;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Collection;

class ProductsResource extends ResourceCollection implements ApiResponse
{
    public function toArray($request)
    {
        return $this->presentCollection($this->collection);
    }

    public function present(ProductTableValue $tableValue)
    {
        return [
            'id' => $tableValue->id(),
            'name' => $tableValue->name(),
            'price' => $tableValue->price(),
            'discount_price' => $tableValue->discountPrice(),
        ];
    }

    public function presentCollection(Collection $collection)
    {
        return $collection
            ->map(function (ProductTableValue $tableValue) {
                return $this->present($tableValue);
            })
            ->all();
    }
}
