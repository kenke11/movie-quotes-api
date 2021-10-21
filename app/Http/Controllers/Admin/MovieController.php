<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use App\Models\Quote;
use Illuminate\Http\Request;

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $movie = new Movie();



        $this->validate( $request, [
            'name_ge' => 'required',
            'name_en' => 'required',
            'quote_ge' => 'required',
            'quote_en' => 'required',
            'img' => 'required|image',
        ]);

        $movie->name_ge = $request->name_ge;
        $movie->name_en = $request->name_en;
        $movie->quote_ge = $request->quote_ge;
        $movie->quote_en = $request->quote_en;

        $movie['img'] = request()->file('img')->storePublicly('img');

        $movie->save();



        return redirect('admin_panel')->with('success', 'Movie add');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $movie = Movie::find($id);

        $this->validate( $request, [
            'name_ge' => 'required',
            'name_en' => 'required',
            'quote_ge' => 'required',
            'quote_en' => 'required',
        ]);

        $movie->name_ge = $request->name_ge;
        $movie->name_en = $request->name_en;
        $movie->quote_ge = $request->quote_ge;
        $movie->quote_en = $request->quote_en;

        if ($request->img !== null){
            $movie['img'] = request()->file('img')->storePublicly('img');
        }

        $movie->save();


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
