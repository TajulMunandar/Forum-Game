<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DashboardController;

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

Route::prefix('/dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index']);

    Route::resource('/game/list-game', GameController::class);

    Route::get('/game/list-rating', [RatingController::class, 'index']);

    Route::resource('/game/list-kategori', KategoriController::class);

    Route::resource('/user', UserController::class);
});
