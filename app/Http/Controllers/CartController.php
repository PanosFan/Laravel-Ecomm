<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Cart;
use Illuminate\Http\Request;

use function Symfony\Component\String\b;

class CartController extends Controller
{
    public function addCart($id)
    {
        $user = session()->get('user_id');
        $price = Book::find($id)->price;
        $title = Book::find($id)->title;
        Cart::create([
            'user' => $user,
            'price' => $price,
            'title' => $title
        ]);
        return redirect()->back();
    }

    public function getCart()
    {
        $data = Cart::where('user', session()->get('user_id'))->get();
        return view('cart', compact('data'));
    }

    public function  checkOut()
    {
        $result = Cart::where('user', session()->get('user_id'));
        $result->delete();
        return redirect(route('get.home'));
    }
}