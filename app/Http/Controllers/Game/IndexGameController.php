<?php

namespace App\Http\Controllers\Game;

use App\Http\Resources\GameResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class IndexGameController extends GameController
{
    public function __invoke() :AnonymousResourceCollection
    {
        return GameResource::collection($this->gameService->showAll());
    }
}
