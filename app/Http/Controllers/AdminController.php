<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin()
    {
        $data = Author::all();
        return view('admin.index', compact('data'));
    }

    public function createListing()
    {
        return view('admin.create');
    }
}
