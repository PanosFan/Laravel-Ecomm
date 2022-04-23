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

        User::create([
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'email' => $request->email,
        ]);

        return redirect()->back()->with('success', 'User registered, proceed to the login page');
    }

    public function signin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        $check = User::where('email', $request->email)->first();
        if (!$check) {
            return redirect()->back()->with('error', 'This email is not registered');
        }

        if ($check && Hash::check($request->password, $check->password)) {
            session()->put('user_id', $check['email']);
            session()->put('role', $check['role']);
            if ($check['role'] === 'admin') {
                return redirect(route('admin'));
            } else {
                return redirect(route('get.home'));
            }
        } else {
            return redirect()->back()->with('error', 'Credentials do not match');
        }
    }
}