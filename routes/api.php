<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CategoryGame\DeleteCategoryGameController;
use App\Http\Controllers\CategoryGame\GameByCategoryNameController;
use App\Http\Controllers\CategoryGame\IndexCategoryGameController;
use App\Http\Controllers\CategoryGame\ShowCategoryGameController;
use App\Http\Controllers\CategoryGame\StoreCategoryGameController;
use App\Http\Controllers\CategoryGame\UpdateCategoryGameController;
use App\Http\Controllers\Game\CategoryGameByGameIdController;
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

Route::group(['middleware'=>'jwt.auth','prefix' => 'game'], function () {
    Route::get('/', IndexGameController::class);
    Route::get('show/{id}', ShowGameController::class);
    Route::post('store', StoreGameController::class);
    Route::put('update/{id}', UpdateGameController::class);
    Route::delete('delete/{id}', DeleteGameController::class);
    Route::get('categories-of-game/{id}', CategoryGameByGameIdController::class);
});

Route::group(['middleware'=>'jwt.auth','prefix' => 'category-game'], function () {
    Route::get('/', IndexCategoryGameController::class);
    Route::get('show/{id}', ShowCategoryGameController::class);
    Route::post('store', StoreCategoryGameController::class);
    Route::put('update/{id}', UpdateCategoryGameController::class);
    Route::delete('delete/{id}', DeleteCategoryGameController::class);
    Route::get('games-of-category/{name}', GameByCategoryNameController::class);
});

Route::group(['middleware' => 'api', 'prefix' => 'auth'], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
});
