<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use App\Models\Movie;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
	public function index()
	{
		$movies = Movie::orderby('created_at', 'DESC')
			->where('name', 'like', '%' . request()->search . '%')
			->paginate(6)->appends(request()->all());
		return view('admin.movie.index', [
			'movies' => $movies,
		]);
	}

	public function create()
	{
		return view('admin.movie.create');
	}

	public function store(MovieRequest $request)
	{
		$movie = new Movie();
		$fieldMovie = $request->validated();

		$translations = [
			'en' => $request->name['en'],
			'ge' => $request->name['ge'],
		];
		$movie->setTranslations('name', $translations);
		$fieldMovie['name'] = $movie->getTranslations('name');
		$fieldMovie['img'] = $request->file('img')->storePublicly('img');
		Movie::create($fieldMovie);
		return redirect('admin_panel')->with('success', 'Movie created!');
	}

	public function edit($id)
	{
		$movie = Movie::find($id);
		$quotes = $movie->quotes;
		return view('admin.movie.edit', [
			'movie'  => $movie,
			'quotes' => $quotes,
		]);
	}

	public function update($id, UpdateMovieRequest $request)
	{
		$movie = Movie::find($id);
		$fieldMovie = $request->validated();
		$translations = [
			'en' => $request->name['en'],
			'ge' => $request->name['ge'],
		];
		$movie->setTranslations('name', $translations);
		$fieldMovie['name'] = $movie->getTranslations('name');
		if ($request->img !== null)
		{
			Storage::delete($movie->img);
			$fieldMovie['img'] = $request->file('img')->storePublicly('img');
		}
		$movie->update($fieldMovie);

		return redirect()->back()->with('success', 'Movie updated!');
	}

	public function destroy($id)
	{
		$post = Movie::find($id);
		foreach ($post->quotes as $quote)
		{
			Storage::delete($quote->quote_img);
			$quote->delete();
		}
		Storage::delete($post->img);
		$post->delete();
		return redirect()->back()->with('success', 'Movie deleted!');
	}
}
