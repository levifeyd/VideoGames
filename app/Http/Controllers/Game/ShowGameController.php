<?php

namespace App\Http\Controllers\Game;

use App\Http\Resources\GameResource;
use Exception;
use Illuminate\Http\JsonResponse;

class ShowGameController extends GameController
{
    public function __invoke(int $id):GameResource|JsonResponse
    {
        try {
            return new GameResource($this->gameService->show($id));
        } catch (Exception $exception) {
            return $this->errorResponse('Game doesnt exist');
        }

    }
}
