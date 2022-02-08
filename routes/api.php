<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\MovieController;
use App\Models\Movie;
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

Route::get('movies', function (Movie $movies) {
	return $movies->with('quotes')->get();
});

Route::post('movie/create', [MovieController::class, 'store']);

Route::post('movie/{id}/update', [MovieController::class, 'update']);

Route::delete('movie/{id}/delete', [MovieController::class, 'destroy']);

Route::get('movie/{id}/quotes', function ($id) {
	$movie = Movie::with('quotes')->where('id', $id)->get();
	return $movie;
});

Route::post('admin_panel/login', [AuthController::class, 'login']);
