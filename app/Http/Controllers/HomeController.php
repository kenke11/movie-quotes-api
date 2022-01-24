<?php

namespace App\Http\Controllers;

use App\Models\Movie;

class HomeController extends Controller
{
	public function index()
	{
		$movie = Movie::all();
		if ($movie->count() > 0)
		{
			$movie = Movie::all()->random();
			if ($movie->quotes->count() > 0)
			{
				$quote = $movie->quotes->first()->quote;
			}
			else
			{
				$quote = null;
			}
		}
		else
		{
			$quote = null;
		}

		return view('welcome', [
			'movie' => $movie,
			'quote' => $quote,
		]);
	}

	public function show($id)
	{
		$movie = Movie::find($id);
		return view('quote', [
			'movie' => $movie,
		]);
	}

	public function language($lang)
	{
		cache()->put('lang', $lang);
		return redirect()->back();
	}
}
