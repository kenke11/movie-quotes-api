<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{

    /**
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create() {
        return view('login.create');
    }

    /**
     *
     * @param  \App\Http\Requests\LoginRequest  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(LoginRequest $request) {
        $attribute = $request->validate($request->rules());
        if(auth()->attempt($attribute)) {
            $request->session()->regenerate();
            return redirect('/admin_panel')->with('success', 'Welcome Back!.');
        }
        throw ValidationException::withMessages([
            'email' => 'Your provided credentials could not be verified.'
        ]);
    }

    /**
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function logout(){
        auth()->logout();
        return redirect('/');
    }

}
