<?php

namespace App\Http\Controllers\CategoryGame;

use Exception;
use Illuminate\Http\JsonResponse;

class DeleteCategoryGameController extends CategoryGameController
{
    public function __invoke($id) : JsonResponse
    {
        try {
            $data = $this->categoryGameService->delete($id);
            return $this->successResponse($data, "Success, game deleted!");
        }
        catch (Exception $exception) {
            return $this->errorResponse('Category doesnt exist');
        }
    }
}
