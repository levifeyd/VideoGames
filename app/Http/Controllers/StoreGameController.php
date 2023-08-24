<?php

namespace App\Http\Controllers;

use App\Http\Requests\GameRequest;
use App\Http\Resources\GameResource;

class StoreGameController extends Controller
{
    public function __invoke(GameRequest $request):GameResource
    {
        return new GameResource($this->gameService->store($request));
    }
}
