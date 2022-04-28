<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{

    public function storeComments(Request $request)
    {
        $request->validate([
            'comments' => 'required'
        ]);
        Contact::create([
            'email' => session()->get('user_id'),
            'comments' => $request->comments,
        ]);
        return redirect()->back()->with('success', 'Form submitted');
    }
}