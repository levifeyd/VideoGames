<?php

namespace App\Http\Controllers\Game;

use App\Http\Resources\CategoryGameResource;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CategoryGameByGameIdController extends GameController
{
    public function __invoke(int $id) : AnonymousResourceCollection|JsonResponse
    {
        try {
            return CategoryGameResource::collection($this->gameService->getCategoryGame($id));
        } catch (Exception $exception){
            return $this->errorResponse('Game doesnt exist');
        }
    }
}
