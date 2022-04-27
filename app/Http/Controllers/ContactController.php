<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function contact()
    {
        return view('contact');
    }

    public function storeComments(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'comments' => 'required'
        ]);
        Contact::create([
            'email' => $request->email,
            'comments' => $request->comments,
        ]);
        return redirect()->back()->with('success', 'Form submitted');
    }
}