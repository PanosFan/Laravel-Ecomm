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
            'image' => 'required|mimes:png,jpg,jpeg,webp|max:5048',
            'title' => 'required',
            'author' => 'required',
            'description' => 'required',
            'price' => 'required|integer|min:0'
        ]);

        $imageName = time() . '-' . $request->title . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        Book::create([
            'image' => $imageName,
            'title' => $request->title,
            'author' => $request->author,
            'description' => $request->description,
            'price' => $request->price,
        ]);
        return redirect(route('get.admin'));
    }
}
