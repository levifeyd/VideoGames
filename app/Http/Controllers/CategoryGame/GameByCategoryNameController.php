<?php

namespace App\Http\Controllers\CategoryGame;

use App\Http\Controllers\Game\GameController;
use App\Http\Resources\CategoryGameResource;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class GameByCategoryNameController extends CategoryGameController
{
    public function __invoke(string $name) : AnonymousResourceCollection|JsonResponse
    {
        try {
            return CategoryGameResource::collection($this->categoryGameService->getGameByCategory($name));
        } catch (Exception $exception) {
            return $this->errorResponse('Category doesnt exist');
        }
    }
}
