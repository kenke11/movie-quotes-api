<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {

        $movie = Movie::all()->random();


        return view('welcome', [
            'movie' => $movie
        ]);

    }
}
