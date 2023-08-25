<?php

namespace App\Services;

use App\Http\Requests\CategoryGameRequest;
use App\Http\Requests\GameRequest;
use App\Repositories\CategoryGameRepository;
use App\Repositories\GameRepository;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class CategoryGameService
{
    private CategoryGameRepository $categoryGameRepository;
    public function __construct(CategoryGameRepository $categoryGameRepository)
    {
        $this->categoryGameRepository = $categoryGameRepository;
    }

    public function showAll():Collection {
        return $this->categoryGameRepository->all();
    }
    public function show($id): Model {
        return $this->categoryGameRepository->getById($id);
    }

    /**
     * @throws \Exception
     */
    public function update(CategoryGameRequest $request, int $id): Model {
        return $this->categoryGameRepository->updateById($id, $request->all());
    }

    public function store(CategoryGameRequest $request):Model {
        return $this->categoryGameRepository->create($request->all());
    }

    /**
     * @throws \Exception
     */
    public function delete($id):bool {
        try {
            return $this->categoryGameRepository->deleteById($id);
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function getCategoryGame(int $id):Collection {
        try {
            return $this->categoryGameRepository->getById($id)->categories;
        } catch (Exception $exception) {
            throw $exception;
        }
    }
}
