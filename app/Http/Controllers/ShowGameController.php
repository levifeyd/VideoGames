<?php

namespace App\Http\Controllers;

use App\Http\Resources\GameResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ShowGameController extends Controller
{
    public function __invoke(int $id):GameResource
    {
        return new GameResource($this->gameService->show($id));
    }
}
