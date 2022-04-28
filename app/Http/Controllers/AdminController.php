<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Contact;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function deleteComment($id)
    {
        $comment = Contact::find($id);
        $comment->delete();
        return redirect()->back();
    }
    public function comments()
    {
        $data = Contact::all();
        return view('admin.comments', compact('data'));
    }
    public function editListing($id)
    {
        $book = Book::find($id);
        return view('admin.edit', compact('book'));
    }

    public function updateListing(Request $request, $id)
    {
        $request->validate([
            'image' => 'mimes:png,jpg,jpeg,webp|max:5048',
            'title' => 'required',
            'author' => 'required',
            'description' => 'required',
            'price' => 'required|integer|min:0'
        ]);

        $book = Book::find($id);

        if ($request->has('isTrending')) {
            $trending = true;
        } else {
            $trending = false;
        }

        if ($request->has('image')) {
            $path = $book['image'];
            unlink("images/" . $path);
            $imageName = time() . '-' . $request->title . '.' . $request->image->extension();
            $book->update([
                'image' => $imageName,
                'title' => $request->title,
                'author' => $request->author,
                'description' => $request->description,
                'price' => $request->price,
                'isTrending' => $trending,
            ]);
            $request->image->move(public_path('images'), $imageName);
        } else {
            $book->update([
                'title' => $request->title,
                'author' => $request->author,
                'description' => $request->description,
                'price' => $request->price,
                'isTrending' => $trending,
            ]);
        }
        return redirect(route('get.admin'));
    }

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


    public function storeListing(Request $request)
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