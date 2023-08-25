<?php

namespace app\Http\Controllers\CategoryGame;

use App\Http\Requests\CategoryGameRequest;
use App\Http\Resources\CategoryGameResource;

class StoreCategoryGameController extends CategoryGameController
{
    public function __invoke(CategoryGameRequest $request):CategoryGameResource
    {
        return new CategoryGameResource($this->categoryGameService->store($request));
    }
}
