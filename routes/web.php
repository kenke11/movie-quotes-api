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

Route::get('lang/{lang}', [HomeController::class, 'language'])->name('lang');

Route::middleware('set-locale')->group( function (){
    Route::get('/', [HomeController::class, 'index']);
    Route::get('movie/{id}', [HomeController::class, 'show']);
});

Route::middleware('guest')->group(function() {
    Route::get('login', [SessionController::class, 'create'])->name('login');
    Route::post('login', [SessionController::class, 'store']);
});

Route::middleware('auth')->prefix('admin_panel')->group(function () {
    Route::get('/', [MovieController::class, 'index']);
    Route::prefix('movie')->group(function () {
        Route::get('create', [MovieController::class, 'create']);
        Route::post('/', [MovieController::class, 'store']);
        Route::prefix('edit')->group(function () {
            Route::get('{id}', [MovieController::class, 'edit']);
            Route::post('{id}/quote', [QuoteController::class, 'store']);
            Route::put('quote/update/{id}', [QuoteController::class, 'update']);
            Route::delete('edit/quote/delete/{id}', [QuoteController::class, 'destroy']);
        });
        Route::post('update/{id}', [MovieController::class, 'update']);
        Route::delete('delete/{id}', [MovieController::class, 'destroy']);
    });
    Route::post('logout', [SessionController::class, 'logout']);
});
