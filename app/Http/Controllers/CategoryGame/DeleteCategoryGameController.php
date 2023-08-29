<?php

namespace App\Http\Controllers\CategoryGame;

use Exception;
use Illuminate\Http\JsonResponse;

class DeleteCategoryGameController extends CategoryGameController
{
    public function __invoke($id): JsonResponse
    {
        $existGameResponse = $this->checkExistGameByCategoryId($id);
        if (!$existGameResponse) {
            $this->categoryGameService->delete($id);
            return $this->successResponse("Success, category deleted!");
        } else {
            return $existGameResponse;
        }
    }
}
