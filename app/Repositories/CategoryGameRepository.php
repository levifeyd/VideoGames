<?php

namespace App\Repositories;


use App\Models\Category;;

class CategoryGameRepository extends BaseRepository
{
    /**
     * Specify Model class name.
     */
    public function model()
    {
        return Category::class;
    }
}
