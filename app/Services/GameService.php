<?php

namespace App\Services;

use App\Http\Requests\GameRequest;
use App\Repositories\GameRepository;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class GameService
{
    private GameRepository $videoRepository;
    public function __construct(GameRepository $videoRepository)
    {
        $this->videoRepository = $videoRepository;
    }

    public function showAll():Collection {
        return $this->videoRepository->all();
    }
    public function show($id): Model {
        return $this->videoRepository->getById($id);
    }

    /**
     * @throws \Exception
     */
    public function update(GameRequest $request, int $id): Model {
        return $this->videoRepository->updateById($id, $request->all());
    }

    public function store(GameRequest $request):Model {
        return $this->videoRepository->create($request->all());
    }

    /**
     * @throws \Exception
     */
    public function delete($id):bool {
        try {
            return $this->videoRepository->deleteById($id);
        } catch (Exception $exception) {
            throw $exception;
        }
    }
}
