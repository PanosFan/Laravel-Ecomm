<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function signup(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'password' => 'required',
            'email' => 'required'
        ]);

        if ($request->password !== $request->passwordR) {
            return redirect()->back()->with('error', 'Passwords need to match');
        }
        if (User::where('email', $request->email)->first()) {
            return redirect()->back()->with('error', 'Email already taken');
        }

        $user = new User;
        $user->name = $request->name;
        $user->password = Hash::make($request->password);
        $user->email = $request->email;
        $user->save();
        return redirect()->back()->with('success', 'User registered, proceed to the login page');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        $check = User::where('email', $request->email)->first();

        if ($check && Hash::check($request->password, $check->password)) {
            session()->put('user_id', $request->email);
            return redirect(route('get.home'));
        } else {
            return redirect()->back()->with('error', 'Credentials do not match');
        }
    }
}