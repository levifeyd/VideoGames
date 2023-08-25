<?php

namespace app\Http\Controllers\CategoryGame;

use Exception;
use Illuminate\Http\JsonResponse;

class DeleteCategoryGameController extends CategoryGameController
{
    public function __invoke($id) :JsonResponse
    {
        try {
            $data = $this->categoryGameService->delete($id);
            return $this->successResponse($data, "Success, game deleted!");
        }
        catch (Exception $exception) {
            return $this->errorResponse('Game doesnt exist');
        }
    }
}
