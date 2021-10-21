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


        return view('welcome', [
            'movie' => $movie
        ]);

    }

    public function language($lang) {
        session(['lang' => $lang]);
        return redirect()->back();
    }
}
