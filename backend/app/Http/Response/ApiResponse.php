<?php

namespace App\Http\Response;

use Illuminate\Http\JsonResponse;

class ApiResponse extends JsonResponse
{
    public static function success($response, array $meta = [])
    {
        return new static([
            'data' => $response,
            'meta' => $meta
        ]);
    }

    public static function emptySuccess()
    {
        return new static();
    }

    public static function error($exception)
    {
        return new static([
            'error' => $exception->toArray()
        ], $exception->getStatus());
    }
}