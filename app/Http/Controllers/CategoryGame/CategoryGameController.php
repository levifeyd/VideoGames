<?php

namespace App\Http\Controllers\CategoryGame;

use App\Repositories\CategoryGameRepository;
use App\Services\CategoryGameService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

class CategoryGameController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected CategoryGameService $categoryGameService;

    public function __construct(CategoryGameRepository $categoryGameRepository)
    {
        $this->categoryGameService = new CategoryGameService($categoryGameRepository);
    }

    protected function successResponse($data, $message = null, $status = 200) : JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data
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
