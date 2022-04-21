<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        if (session()->has('user_id')) {
            return view('home');
        } else {
            return redirect('login');
        }
    }

    public function loginPage()
    {
        return view('login');
    }

    public function registerPage()
    {
        return view('register');
    }

    public function logout()
    {
        session()->forget('user_id');
        return redirect(route('get.login'));
    }
}