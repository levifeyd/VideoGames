<?php

namespace App\Http\Controllers\Game;

use App\Http\Requests\GameRequest;
use App\Http\Resources\GameResource;

class StoreGameController extends GameController
{
    public function __invoke(GameRequest $request):GameResource
    {
        return new GameResource($this->gameService->store($request));
    }
}
