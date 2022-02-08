<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MovieController extends Controller
{
	public function store(Request $request)
	{
		$validator = Validator::make(
			$request->all(),
			[
				'name_en' => 'required|min:3|max:255',
				'name_ge' => 'required|min:3|max:255',
				'img'     => 'required|image',
			]
		);

		if ($validator->fails())
		{
			return response()->json([
				'status'  => 'error',
				'message' => 'Validation error!',
				'errors'  => $validator->errors(),
			]);
		}

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

	public function update($id, Request $request)
	{
		$movie = Movie::find($id);

		$validator = Validator::make(
			$request->all(),
			[
				'name_en' => 'required|min:3|max:255',
				'name_ge' => 'required|min:3|max:255',
			]
		);

		if ($validator->fails())
		{
			return response()->json([
				'status'  => 'error',
				'message' => 'Validation error!',
				'errors'  => $validator->errors(),
			]);
		}

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
