<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{

    public function create() {
        return view('login.create');
    }

    public function store(Request $request) {

        $email = $request->email;
        $password = $request->password;

        $attribute = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

//        dd(Auth::attempt(['email' => $email, 'password' => $password]));

        if(auth()->attempt($attribute)) {
            $request->session()->regenerate();
            return redirect('/admin_panel')->with('success', 'Welcome Back!.');
        }

        dd('not login');

        throw ValidationException::withMessages([
            'username' => 'Your provided credentials could not be verified.'
        ]);

    }

    public function logout(){
        auth()->logout();

        return redirect('/');
    }

}
