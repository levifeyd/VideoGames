<?php

namespace App\Http\Controllers;

use App\Http\Resources\GameResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class IndexGameController extends Controller
{
    public function __invoke() :AnonymousResourceCollection
    {
        return GameResource::collection($this->gameService->showAll());
    }
}
