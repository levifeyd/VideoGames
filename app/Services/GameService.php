<?php

namespace App\Services;

use App\Http\Requests\GameRequest;
use App\Repositories\GameRepository;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class GameService
{
    private GameRepository $gameRepository;
    public function __construct(GameRepository $gameRepository)
    {
        $this->gameRepository = $gameRepository;
    }

    public function showAll():Collection {
        return $this->gameRepository->all();
    }
    public function show($id): Model {
        return $this->gameRepository->getById($id);
    }

    /**
     * @throws \Exception
     */
    public function update(GameRequest $request, int $id): Model {
        return $this->gameRepository->updateById($id, $request->all());
    }

    public function store(GameRequest $request):Model {
        return $this->gameRepository->create($request->all());
    }

    /**
     * @throws \Exception
     */
    public function delete($id):bool {
        try {
            return $this->gameRepository->deleteById($id);
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function getCategoryGame(int $id):Collection {
        try {
            return $this->gameRepository->getById($id)->categories;
        } catch (Exception $exception) {
            throw $exception;
        }
    }
}
