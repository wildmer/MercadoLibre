<?php

namespace App\Http\Controllers;

use App\Models\User;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Auth\AuthRequest;

class AuthUserAPIController extends Controller
{
    public function login(AuthRequest $request)
	{
		$user = User::where('email', $request->email)->first();
		if (!$user) return response()->json($this->handlerMessage(401), 401);
		if (!Hash::check($request->password, $user->password)) {
			return response()->json($this->handlerMessage(401), 401);
		}
		$token = $user->createToken('auth_token')->plainTextToken;
		$data = ['access_token' => $token];
		return response()->json($this->handlerMessage(200, $data), 200);
	}

	public function logout() {
		$user = Auth::user()->tokens()->delete();
		return response()->json([], 204);
	}

	public function profile() {
		return response()->json(['auth_user' => Auth::User], 200);
	}

	private function handlerMessage($code, $data = null)
	{
		switch ($code) {
			case 401:
				return ['login' => false, 'message' => 'Password or email not valid'];

			default:
				return ['login' => true, 'message' => 'Login successful', 'data' => $data];
		}
	}
}
