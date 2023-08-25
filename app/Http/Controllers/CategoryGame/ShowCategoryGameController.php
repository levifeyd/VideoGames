<?php

namespace App\Http\Controllers\CategoryGame;

use App\Http\Resources\CategoryGameResource;
use Exception;
use Illuminate\Http\JsonResponse;

class ShowCategoryGameController extends CategoryGameController
{
    public function __invoke($id) : CategoryGameResource|JsonResponse
    {
        try {
            return new CategoryGameResource($this->categoryGameService->show($id));
        } catch (Exception $exception) {
            return $this->errorResponse('Category doesnt exist');
        }
    }
}
