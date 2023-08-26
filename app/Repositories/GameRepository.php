<?php

namespace App\Repositories;


use App\Repositories\BaseRepository;
use App\Models\Game;
use Illuminate\Database\Eloquent\Collection;

class GameRepository extends BaseRepository
{
    /**
     * Specify Model class name.
     */
    public function model(): string
    {
        return Game::class;
    }

    public function getGamesCategories(int $id): Collection
    {
        $this->unsetClauses();
        return $this->getById($id)->categories;
    }
}
