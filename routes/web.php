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


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('movie/{id}', [HomeController::class, 'show'])->name('movie.show');

Route::middleware('guest')->group(function() {
    Route::get('login', [SessionController::class, 'create'])->name('login.create');
    Route::post('login', [SessionController::class, 'store'])->name('login.store');
});

Route::middleware('auth')->prefix('admin_panel')->group(function () {
    Route::get('/', [MovieController::class, 'index'])->name('admin.index');
    Route::prefix('movie')->group(function () {
        Route::get('create', [MovieController::class, 'create'])->name('movie.create');
        Route::post('/', [MovieController::class, 'store'])->name('movie.store');
        Route::prefix('edit')->group(function () {
            Route::get('{id}', [MovieController::class, 'edit'])->name('movie.edit');
            Route::post('{id}/quote', [QuoteController::class, 'store'])->name('quote.store');
            Route::put('quote/update/{id}', [QuoteController::class, 'update'])->name('quote.update');
            Route::delete('quote/delete/{id}', [QuoteController::class, 'destroy'])->name('quote.delete');
        });
        Route::post('update/{id}', [MovieController::class, 'update'])->name('movie.update');
        Route::delete('delete/{id}', [MovieController::class, 'destroy'])->name('movie.delete');
    });
    Route::post('logout', [SessionController::class, 'logout'])->name('logout');
});
