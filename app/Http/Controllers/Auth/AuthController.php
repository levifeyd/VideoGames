<?php

namespace App\Http\Controllers\Auth;

use App\Traits\Login;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

class AuthController extends BaseController
{
    use Login;

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    public function login(): JsonResponse
    {
        return $this->tryToLogin(request(['email', 'password']));
    }
    public function me(): JsonResponse
    {
        return response()->json(auth()->user());
    }

    public function logout(): JsonResponse
    {
        auth()->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }

    public function refresh(): JsonResponse
    {
        return $this->respondWithToken(auth()->refresh());
    }
}
