<?php

namespace App\Http\Controllers;

use App\Http\Requests\GameRequest;
use App\Http\Resources\GameResource;

class UpdateGameController extends Controller
{
    public function __invoke(GameRequest $request, int $id) :GameResource
    {
        return new GameResource($this->gameService->update($request, $id));
    }
}
