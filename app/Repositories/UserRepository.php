<?php

namespace App\Repositories;


use App\Models\User;

class UserRepository extends BaseRepository
{
    /**
     * Specify Model class name.
     */
    public function model(): string
    {
        return User::class;
    }
}
