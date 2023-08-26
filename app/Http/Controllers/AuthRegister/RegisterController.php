<?php

namespace App\Http\Controllers\AuthRegister;

use App\Http\Requests\UserRequest;
use App\Repositories\UserRepository;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;


class RegisterController extends BaseController
{
    private UserService $userService;

    public function __construct(UserRepository $userRepository)
    {
        $this->middleware('guest');
        $this->userService = new UserService($userRepository);
    }

    public function register(UserRequest $request): JsonResponse
    {
        return $this->userService->register($request);
    }

}
