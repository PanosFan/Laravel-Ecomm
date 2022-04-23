<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{

    public function home()
    {
        return view('home');
    }


    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function admin()
    {
        return view('admin');
    }

    public function logout()
    {
        session()->forget('user_id');
        session()->forget('role');
        return redirect(route('get.login'));
    }
}