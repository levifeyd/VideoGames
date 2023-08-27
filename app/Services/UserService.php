<?php

namespace App\Services;

use App\Http\Requests\UserRequest;
use App\Repositories\UserRepository;
use App\Traits\Login;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class UserService
{
    use Login;
    private UserRepository $userRepository;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository= $userRepository;
    }

    public function register(UserRequest $request): JsonResponse
    {
        $user = $this->store($request);
        return $this->tryToLogin(['email'=>$user->email, 'password'=>$request->password]);
    }

    private function store(UserRequest $request): Model
    {
        $dataForCreatingUser = $request->all();
        $dataForCreatingUser["password"] = Hash::make($request->password);
        return $this->userRepository->create([$dataForCreatingUser]);
    }
}
