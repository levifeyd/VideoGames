<?php

namespace App\Http\Controllers\CategoryGame;

use App\Repositories\CategoryGameRepository;
use App\Services\CategoryGameService;
use App\Traits\Responses;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

class CategoryGameController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, Responses;

    protected CategoryGameService $categoryGameService;

    public function __construct(CategoryGameRepository $categoryGameRepository)
    {
        $this->categoryGameService = new CategoryGameService($categoryGameRepository);
    }

}
