<?php

namespace App\Http\Controllers\CategoryGame;

use Exception;
use Illuminate\Http\JsonResponse;

class DeleteCategoryGameController extends CategoryGameController
{
    public function __invoke($id): JsonResponse
    {
        try {
            $this->categoryGameService->delete($id);
            return $this->successResponse("Success, category deleted!");
        }
        catch (Exception $exception) {
            return $this->errorResponse('Category doesnt exist');
        }
    }
}
