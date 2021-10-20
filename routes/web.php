<?php

use App\Http\Controllers\Admin\MovieController;
use App\Http\Controllers\Admin\QuoteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SessionController;
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

Route::get('/', [HomeController::class, 'index']);

Route::middleware('guest')->group(function() {
    Route::get('login', [SessionController::class, 'create'])->name('login');
    Route::post('login', [SessionController::class, 'store']);
});

Route::middleware('auth')->prefix('admin_panel')->group(function () {
    Route::get('/', [MovieController::class, 'index']);
    Route::get('/movie/create', [MovieController::class, 'create']);
    Route::post('movie', [MovieController::class, 'store']);

    Route::get('movie/edit/{id}', [MovieController::class, 'edit']);
    Route::post('movie/update/{id}', [MovieController::class, 'update']);

    Route::delete('movie/delete/{id}', [MovieController::class, 'destroy']);

    Route::post('movie/edit/{id}/quote', [QuoteController::class, 'store']);
    Route::put('movie/edit/quote/update/{id}', [QuoteController::class, 'update']);
    Route::delete('movie/edit/quote/delete/{id}', [QuoteController::class, 'destroy']);

    Route::post('logout', [SessionController::class, 'logout']);
});
