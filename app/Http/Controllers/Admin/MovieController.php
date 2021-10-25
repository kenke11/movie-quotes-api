<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use App\Models\Movie;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    /**
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::all();
        return view('admin.movie.index', [
            'movies' => $movies
        ]);
    }

    /**
     * Show the form for creating a new movies.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.movie.create');
    }

    /**
     * Store a newly created movie in storage.
     *
     * @param  \App\Http\Requests\MovieRequest  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(MovieRequest $request)
    {
        $movie = $request->validated();
        $movie['img'] = $request->file('img')->storePublicly('img');
        Movie::create($movie);
        return redirect('admin_panel')->with('success', 'Movie add');
    }

    /**
     * Show the form for editing the specified movie.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movie = Movie::find($id);
        $quotes = $movie->quotes;
        return view('admin.movie.edit', [
            'movie' => $movie,
            'quotes' => $quotes
        ]);
    }

    /**
     * Update the specified movie in storage.
     *
     * @param  \App\Http\Requests\UpdateMovieRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id, UpdateMovieRequest $request)
    {
        $movie = Movie::find($id);
        $attribute = $request->validated();
        if ($request->img !== null){
            Storage::delete($movie->img);
            $attribute['img'] = $request->file('img')->storePublicly('img');
        }
        $movie->update($attribute);
        return redirect()->back()->with('success', 'Movie update!');
    }

    /**
     * Remove the specified movie from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $post = Movie::find($id);
        foreach($post->quotes as $quote){
            Storage::delete($quote->quote_img);
            $quote->delete();
        }
        Storage::delete($post->img);
        $post->delete();
        return redirect()->back()->with('success' ,'Movie deleted!');
    }
}
