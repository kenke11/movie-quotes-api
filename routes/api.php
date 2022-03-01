<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\MovieController;
use App\Http\Controllers\API\QuoteController;
use App\Models\Movie;
use Illuminate\Support\Facades\Route;

Route::get('movies', function (Movie $movies) {
	return $movies->with('quotes')->get();
});

Route::get('movie/{id}/quotes', function ($id) {
	$movie = Movie::with('quotes')->where('id', $id)->get();
	return $movie;
});

Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
	Route::post('movie/create', [MovieController::class, 'store']);

	Route::post('movie/{id}/update', [MovieController::class, 'update']);

	Route::delete('movie/{id}/delete', [MovieController::class, 'destroy']);

	Route::post('quote/create', [QuoteController::class, 'store']);

	Route::post('quote/{id}/update', [QuoteController::class, 'update']);

	Route::delete('quote/{id}/delete', [QuoteController::class, 'destroy']);
});
