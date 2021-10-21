<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{

    public function create() {
        return view('login.create');
    }

    public function store(Request $request) {
        $attribute = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if(auth()->attempt($attribute)) {
            $request->session()->regenerate();
            return redirect('/admin_panel')->with('success', 'Welcome Back!.');
        }
        throw ValidationException::withMessages([
            'email' => 'Your provided credentials could not be verified.'
        ]);
    }

    public function logout(){
        auth()->logout();
        return redirect('/');
    }

}
