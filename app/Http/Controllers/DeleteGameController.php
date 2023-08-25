<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\JsonResponse;

class DeleteGameController extends Controller
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
