<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryGameController;
use App\Http\Controllers\DeleteGameController;
use App\Http\Controllers\IndexGameController;
use App\Http\Controllers\ShowGameController;
use App\Http\Controllers\StoreGameController;
use App\Http\Controllers\UpdateGameController;
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

Route::group(['middleware'=>'jwt.auth'], function () {
    Route::get('games', IndexGameController::class);
    Route::get('show/{id}', ShowGameController::class);
    Route::post('store', StoreGameController::class);
    Route::put('update/{id}', UpdateGameController::class);
    Route::delete('delete/{id}', DeleteGameController::class);
    Route::get('games-categories/{id}', CategoryGameController::class);
});

Route::group(['middleware' => 'api', 'prefix' => 'auth',  'namespace' => 'App\Http\Controllers'], function ($router) {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
});
