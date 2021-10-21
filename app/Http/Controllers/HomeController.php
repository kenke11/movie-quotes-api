<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index() {

        $movie = Movie::all()->random();
//
////        dd($movie->name);
////        $movie->getTranslatins();
//        $movie->name = ['en' => $movie->name_en, 'ge' => $movie->name_ge];
//        dd($movie->name->en);

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
        session(['lang' => $lang]);
        return redirect()->back();
    }
}
