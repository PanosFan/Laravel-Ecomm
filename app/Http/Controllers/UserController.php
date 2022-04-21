<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function signup(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'password' => 'required',
            'email' => 'required'
        ]);

        if ($request->input('password') !== $request->input('passwordR')) {
            return redirect()->back()->with('error', 'Passwords need to match');
        }
        if (User::where('email', $request->input('email'))->get()) {
            return redirect()->back()->with('error', 'Email already taken');
        }

        $user = new User;
        $user->name = $request->input('name');
        $user->password = $request->input('password');
        $user->email = $request->input('email');
        $user->save();
        return redirect()->back()->with('success', 'User registered, proceed to the login page');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        $check = User::where('email', $request->input('email'))->where('password', $request->input('password'));
        if ($check) {
            session()->put('user_id', $request->input('email'));
            return redirect(route('get.home'));
        } else {
            return redirect()->back()->with('error', 'Credentials do not match');
        }
    }
}