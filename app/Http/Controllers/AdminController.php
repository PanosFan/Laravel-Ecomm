<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin()
    {
        $data = Book::all();
        return view('admin.index', compact('data'));
    }

    public function createListing()
    {
        return view('admin.create');
    }

    public function postListing(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:png,jpg,jpeg|max:5048',
            'name' => 'required',
            'bio' => 'required'
        ]);
        return redirect(route('get.admin'));
    }
}
