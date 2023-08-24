<?php

namespace App\Repositories;


use App\Repositories\BaseRepository;
use App\Models\Game;

class GameRepository extends BaseRepository
{
    /**
     * Specify Model class name.
     */
    public function model()
    {
        return Game::class;
    }
}
