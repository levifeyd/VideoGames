<?php

namespace app\Http\Controllers\CategoryGame;

use App\Http\Requests\CategoryGameRequest;
use App\Http\Resources\GameResource;
use Exception;
use Illuminate\Http\JsonResponse;

class UpdateCategoryGameController extends CategoryGameController
{
    public function __invoke(CategoryGameRequest $request, int $id) : GameResource|JsonResponse
    {
        try {
            return new GameResource($this->categoryGameService->update($request, $id));
        } catch (Exception $e) {
            return $this->errorResponse('Game doesnt exist');
        }
    }
}
