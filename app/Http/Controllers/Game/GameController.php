<?php

namespace App\Http\Controllers\Game;

use App\Repositories\GameRepository;
use App\Services\GameService;
use App\Traits\Responses;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

class GameController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, Responses;

    protected GameService $gameService;

    public function __construct(GameRepository $gameRepository)
    {
        $this->gameService = new GameService($gameRepository);
    }

}
