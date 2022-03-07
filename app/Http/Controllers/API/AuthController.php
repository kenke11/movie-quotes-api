<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AuthController extends Controller
{
	private $idToken;

	public function __construct()
	{
		$this->idToken = uniqid(base64_encode(Str::random(40)));
	}

	public function login(LoginRequest $request)
	{
		$request->validated();

		if (Auth::attempt(['email' => $request->email, 'password' => $request->password]))
		{
			$user = Auth::user();

			return response()->json([
				'status'     => 200,
				'message'    => 'Logged In Successfully!',
				'user'       => $user,
				'token'      => $user->username . $this->idToken,
				'expiresIn'  => '3600',
			]);
		}

		return response()->json([
			'status' => 401,
			'data'   => 'unauthorized',
		]);
	}
}
