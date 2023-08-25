<?php

namespace App\Http\Controllers\Game;

use Exception;
use Illuminate\Http\JsonResponse;

class DeleteGameController extends GameController
{
    public function __invoke($id) :JsonResponse
    {
        try {
            $data = $this->gameService->delete($id);
            return $this->successResponse($data, "Success, game deleted!");
        }
        catch (Exception $exception) {
            return $this->errorResponse('Game doesnt exist');
        }
    }
}
