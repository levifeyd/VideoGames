<?php

namespace App\Http\Controllers\CategoryGame;

use App\Http\Resources\CategoryGameResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class IndexCategoryGameController extends CategoryGameController
{
    public function __invoke(): AnonymousResourceCollection
    {
        return CategoryGameResource::collection($this->categoryGameService->showAll());
    }
}
