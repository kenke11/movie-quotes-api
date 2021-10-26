<?php

namespace App\Http\Controllers;

use App\Models\Movie;

class HomeController extends Controller
{
    /**
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index() {
        $movie = Movie::all();
        if ($movie->count() > 0){
            $movie = Movie::all()->random();
        }
        if ($movie->quotes->count() > 0){
            $quote = $movie->quotes->first()->quote;
        } else {
            $quote = null;
        }
        return view('welcome', [
            'movie' => $movie,
            'quote' => $quote
        ]);
    }

    /**
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id) {
        $movie = Movie::find($id);
        return view('quote', [
            'movie' => $movie
        ]);
    }

    /**
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function language($lang) {
        cache()->put('lang', $lang);
        return redirect()->back();
    }
}
