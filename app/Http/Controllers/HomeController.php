<?php

namespace App\Http\Controllers;

use App\Models\Movie;

class HomeController extends Controller
{
    public function index() {
        $movie = Movie::all()->random();
        return view('welcome', [
            'movie' => $movie
        ]);
    }

    public function show($id) {
        $movie = Movie::find($id);
        return view('quote', [
            'movie' => $movie
        ]);
    }

    public function language($lang) {
        cache()->put('lang', $lang);
        return redirect()->back();
    }
}
