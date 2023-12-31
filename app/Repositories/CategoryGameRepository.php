<?php

namespace App\Repositories;


use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

;

class CategoryGameRepository extends BaseRepository
{
    /**
     * Specify Model class name.
     */
    public function model(): string
    {
        return Category::class;
    }

    public function getGameByCategoryName(string $name): Collection
    {
        $this->unsetClauses();
        return $this->getByColumn($name, 'name')->games;
    }

    public function getGameByCategoryId(int $id) :bool|Collection
    {
        $this->unsetClauses();
        $games = $this->getById($id)->games;
        return count($games) > 0 ? $games : false;

    }
}
