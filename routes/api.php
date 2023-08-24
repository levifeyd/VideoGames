<?php

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

Route::middleware('auth:sanctum')->group( function () {
    Route::get('/', [IndexGameController::class])->name('home');
    Route::get('/show/{id}', [ShowGameController::class])->name('show');
    Route::post('/store', [StoreGameController::class])->name('store');
    Route::put('/update/{id}', [UpdateGameController::class])->name('update');
    Route::delete('/delete/{id}', [DeleteGameController::class])->name('delete');
});
