<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\MovieStoreRequest;
use App\Http\Requests\MovieUpdateRequest;
use App\Models\Movie;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
	public function store(MovieStoreRequest $request)
	{
		$request->validated();

		$movie = new Movie();

		$translations = [
			'en' => $request->name_en,
			'ge' => $request->name_ge,
		];

		$movie->setTranslations('name', $translations);

		$movie->name = $movie->getTranslations('name');
		$movie->img = $request->file('img')->storePublicly('img');

		$movie->save();

		return response()->json([
			'status'  => 'success',
			'message' => 'Movie created!',
		]);
	}

	public function update($id, MovieUpdateRequest $request)
	{
		$request->validated();

		$movie = Movie::find($id);

		$translations = [
			'en' => $request->name_en,
			'ge' => $request->name_ge,
		];
		$movie->setTranslations('name', $translations);
		$movie->name = $movie->getTranslations('name');

		if ($request->img !== 'undefined')
		{
			Storage::delete($movie->img);
			$movie->img = $request->file('img')->storePublicly('img');
		}
		$movie->save();

		return response()->json([
			'status'  => 'success',
			'message' => 'Movie updated successfully!',
		]);
	}

	public function destroy($id)
	{
		$movie = Movie::find($id);
		foreach ($movie->quotes as $quote)
		{
			Storage::delete($quote->quote_img);
			$quote->delete();
		}
		Storage::delete($movie->img);
		$movie->delete();

		return response()->json(['status' => 'Movie deleted!']);
	}
}
