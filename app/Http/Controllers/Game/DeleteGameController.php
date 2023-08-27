<?php

namespace App\Http\Controllers\Game;

use Exception;
use Illuminate\Http\JsonResponse;

class DeleteGameController extends GameController
{
    public function __invoke(int $id): JsonResponse
    {
        try {
            $this->gameService->delete($id);
            return $this->successResponse("Success, game deleted!");
        }
        catch (Exception $exception) {
            return $this->errorResponse('Game doesnt exist');
        }
    }
}
