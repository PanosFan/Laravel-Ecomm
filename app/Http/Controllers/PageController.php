<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class PageController extends Controller
{

    public function home()
    {
        $data = Book::all();
        return view('home', compact('data'));
    }

    public function contact()
    {
        return view('contact');
    }
}
