<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AuthController extends Controller
{
	private $idToken;

	public function __construct()
	{
		$this->idToken = uniqid(base64_encode(Str::random(40)));
	}

	public function login(Request $request)
	{
		if (Auth::attempt(['email' => $request->email, 'password' => $request->password]))
		{
			$user = Auth::user();
			return response()->json([
				'status'                          => 'success',
				'username'                        => $user->username,
				'idToken'                         => $this->idToken,
				'expiresIn'                       => '3600',
			]);
		}
		else
		{
			return response()->json([
				'status' => 'error',
				'data'   => 'unauthorized',
			]);
		}
	}
}
