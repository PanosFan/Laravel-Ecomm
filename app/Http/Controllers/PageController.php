<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        if (isset($_SESSION['user_id'])) {
            return view('home');
        } else {
            return redirect('login');
        }
    }

    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }
}