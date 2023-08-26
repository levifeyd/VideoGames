<?php

namespace App\Http\Controllers\Game;

use App\Http\Requests\GameRequest;
use App\Http\Resources\GameResource;
use Exception;
use Illuminate\Http\JsonResponse;

class UpdateGameController extends GameController
{
    public function __invoke(GameRequest $request, int $id): GameResource|JsonResponse
    {
        try {
            return new GameResource($this->gameService->update($request, $id));
        } catch (Exception $e) {
            return $this->errorResponse('Game doesnt exist');
        }
    }
}
