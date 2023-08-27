<?php

namespace App\Http\Controllers\Game;

use App\Http\Requests\StoreGameRequest;
use App\Http\Resources\GameResource;
use Illuminate\Http\JsonResponse;

class StoreGameController extends GameController
{
    public function __invoke(StoreGameRequest $request): GameResource|JsonResponse
    {
        return new GameResource($this->gameService->store($request));
    }
}
