<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function deleteListing($id)
    {
        $book = Book::find($id);
        $path = $book['image'];
        $book->delete();
        unlink("images/" . $path);
        return redirect(route('get.admin'));
    }

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
        if ($request->has('isTrending')) {
            $trending = true;
        } else {
            $trending = false;
        }
        Book::create([
            'image' => $imageName,
            'title' => $request->title,
            'author' => $request->author,
            'description' => $request->description,
            'price' => $request->price,
            'isTrending' => $trending,
        ]);
        $request->image->move(public_path('images'), $imageName);
        return redirect(route('get.admin'));
    }
}