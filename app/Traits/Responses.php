<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait Responses
{
    protected function successResponse($message = null, $status = 200): JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => $message,
        ], $status);
    }

    protected function errorResponse($message = 'Something went wrong', $status = 500): JsonResponse
    {
        return response()->json([
            'success' => false,
            'message' => $message,
        ], $status);
    }
}
