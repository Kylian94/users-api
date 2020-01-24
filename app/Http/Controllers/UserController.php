<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users =  User::all()->sortByDesc("id");
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

        $userCreated = $user->save();

        if ($userCreated) {
            $message = "User created with success";
            return redirect('/users')->with('message', $message);
        } else {
            $message = "ERROR : user not created";
        }
    }

    public function edit(User $user)
    {
        $user->get();
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $userUpdated = $user->update($request->all());

        if ($userUpdated) {
            $message = "User updated with success";
            return redirect('/users')->with('message', $message);
        } else {
            $message = "ERROR : user is not updated";
        }

        return response()->json($user, 200);
    }

    public function destroy(User $user)
    {
        $userDeleted = $user->delete();

        if ($userDeleted) {
            $message = "User deleted with success";
            return redirect('/users')->with('message', $message);
        } else {
            $message = "ERROR : user is not deleted";
        }
    }
}
