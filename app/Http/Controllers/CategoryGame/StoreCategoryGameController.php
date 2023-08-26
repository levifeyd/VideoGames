<?php

namespace App\Http\Controllers\CategoryGame;

use App\Http\Requests\CategoryGameRequest;
use App\Http\Resources\CategoryGameResource;
use Illuminate\Http\JsonResponse;

class StoreCategoryGameController extends CategoryGameController
{
    public function __invoke(CategoryGameRequest $request): CategoryGameResource|JsonResponse
    {
        return new CategoryGameResource($this->categoryGameService->store($request));
    }
}
