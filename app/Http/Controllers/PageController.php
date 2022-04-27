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

    public function books()
    {
        $data = Book::all();
        return view('books.index', compact('data'));
    }
    public function details($id)
    {
        $data = Book::find($id);
        return view('books.details', compact('data'));
    }
}