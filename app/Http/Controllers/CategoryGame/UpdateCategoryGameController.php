<?php

namespace App\Http\Controllers\CategoryGame;

use App\Http\Requests\CategoryGameRequest;
use App\Http\Resources\CategoryGameResource;
use App\Http\Resources\GameResource;
use Exception;
use Illuminate\Http\JsonResponse;

class UpdateCategoryGameController extends CategoryGameController
{
    public function __invoke(CategoryGameRequest $request, int $id) : CategoryGameResource|JsonResponse
    {
        try {
            return new CategoryGameResource($this->categoryGameService->update($request, $id));
        } catch (Exception $e) {
            return $this->errorResponse('Category doesnt exist');
        }
    }
}
