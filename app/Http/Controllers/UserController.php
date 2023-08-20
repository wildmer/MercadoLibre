<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;

class UserController extends Controller
{
    public function index(Request $request)
	{
		$users = User::get();
		if (!$request->ajax()) return view();
		return response()->json(['users' => $users], 200);
	}


	public function store(UserRequest $request)
	{
		$user = new User($request->all());
		$user->save();
		if (!$request->ajax()) return back()->with('success', 'User created');
		return response()->json(['status' => 'User created', 'user' => $user], 201);
	}


	public function update(UserRequest $request, User $user)
	{
		$user->update($request->all());
		// $user->syncRoles([$request->role]);
		if (!$request->ajax()) return back()->with('success', 'User updated');
		return response()->json([], 204);
	}


	public function destroy(Request $request, User $user)
	{
		$user->delete();
		if (!$request->ajax()) return back()->with('success', 'User deleted');
		return response()->json([], 204);
	}
}
