<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users =  User::all();
        return view("users.list", compact("users"));
    }

    public function show(User $user)
    {
        return view('users.user', compact('user'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(User $user, Request $request)
    {
        $user = new User;
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));

        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $user->save();
        return redirect('/users');
    }

    public function edit(User $user)
    {
        $user->get();
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        return redirect('/users');
        return response()->json($user, 200);
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect('/users');
    }
}
