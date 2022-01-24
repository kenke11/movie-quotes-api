<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
	public function create()
	{
		return view('login.create');
	}

	public function store(LoginRequest $request)
	{
		$attribute = $request->validate($request->rules());
		if (auth()->attempt($attribute))
		{
			$request->session()->regenerate();
			return redirect()->route('admin.index')->with('success', 'Welcome Back!.');
		}
		throw ValidationException::withMessages([
			'email' => 'Your provided credentials could not be verified.',
		]);
	}

	public function logout()
	{
		auth()->logout();
		return redirect()->route('home');
	}
}
