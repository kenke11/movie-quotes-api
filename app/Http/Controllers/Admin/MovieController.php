<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use App\Models\Movie;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::all();
        return view('admin.movie.index', [
            'movies' => $movies
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.movie.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\MovieRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MovieRequest $request)
    {
        $movie = $request->validate($request->rules());
        $movie['img'] = $request->file('img')->storePublicly('img');
        Movie::create($movie);
        return redirect('admin_panel')->with('success', 'Movie add');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMovieRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMovieRequest $request, $id)
    {
        $movie = Movie::find($id);
        $attribute = $request->validate($request->rules());
        if ($request->img !== null){
            $movie['img'] = $request->file('img')->storePublicly('img');
        }
        $movie->update($attribute);
        return redirect()->back()->with('success', 'Movie update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Movie::find($id);
        $post->delete();
        return redirect()->back()->with('success' ,'Movie deleted!');
    }
}
