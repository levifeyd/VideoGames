<?php

namespace App\Http\Controllers\Game;

use App\Repositories\GameRepository;
use App\Services\GameService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

class GameController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected GameService $gameService;

    public function __construct(GameRepository $gameRepository)
    {
        $this->gameService = new GameService($gameRepository);
    }

    protected function successResponse($data, $message = null, $status = 200): JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data
        ], $status);
    }

    protected function errorResponse($message = 'Something went wrong', $status = 500): JsonResponse
    {
        return response()->json([
            'success' => false,
            'message' => $message,
        ], $status);
    }
}
