<?php

use App\Http\Controllers\CreateGameController;
use App\Http\Controllers\DeleteGameController;
use App\Http\Controllers\IndexGameController;
use App\Http\Controllers\ShowGameController;
use App\Http\Controllers\StoreGameController;
use App\Http\Controllers\UpdateGameController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
