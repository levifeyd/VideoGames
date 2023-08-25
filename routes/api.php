<?php

use App\Http\Controllers\Auth\AuthController;
use app\Http\Controllers\CategoryGame\DeleteCategoryGameController;
use app\Http\Controllers\CategoryGame\IndexCategoryGameController;
use app\Http\Controllers\CategoryGame\ShowCategoryGameController;
use app\Http\Controllers\CategoryGame\StoreCategoryGameController;
use app\Http\Controllers\CategoryGame\UpdateCategoryGameController;
use App\Http\Controllers\Game\CategoryGameByIdController;
use App\Http\Controllers\Game\DeleteGameController;
use App\Http\Controllers\Game\IndexGameController;
use App\Http\Controllers\Game\ShowGameController;
use App\Http\Controllers\Game\StoreGameController;
use App\Http\Controllers\Game\UpdateGameController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware'=>'jwt.auth', 'namespace' => 'App\Http\Controllers\Game'], function () {
    Route::get('games', IndexGameController::class);
    Route::get('show/{id}', ShowGameController::class);
    Route::post('store', StoreGameController::class);
    Route::put('update/{id}', UpdateGameController::class);
    Route::delete('delete/{id}', DeleteGameController::class);
});

Route::group(['middleware'=>'jwt.auth', 'namespace' => 'App\Http\Controllers\CategoryGame'], function () {
    Route::get('categories-of-game/{id}', CategoryGameByIdController::class);
    Route::get('games-categories', IndexCategoryGameController::class);
    Route::get('show/{id}', ShowCategoryGameController::class);
    Route::post('store', StoreCategoryGameController::class);
    Route::put('update/{id}', UpdateCategoryGameController::class);
    Route::delete('delete/{id}', DeleteCategoryGameController::class);
});

Route::group(['middleware' => 'api', 'prefix' => 'auth',  'namespace' => 'App\Http\Controllers\Auth'], function ($router) {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
});
