<?php

namespace App\Services;

use App\Http\Requests\GameRequest;
use App\Repositories\GameRepository;
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

    public function update(GameRequest $request, int $id): Model {
        return $this->videoRepository->updateById($id, $request->all());
    }

    public function store(GameRequest $request):Model {
        return $this->videoRepository->create($request->all());
    }

    public function delete($id):bool {
        try {
            $game = $this->videoRepository->deleteById($id);
            return $game;
        } catch (\Exception $exception) {
            throw $exception;
        }
    }
}
