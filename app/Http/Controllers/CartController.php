<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CartItem;

class CartController extends Controller
{
    public function index() {

        $items = CartItem::all();
        return view('cart/index', compact('items'));
    }

    public function add($book_id) {

        $item = CartItem::where('book_id', $book_id)->first();

        if ($item === NULL) {
            $item = new CartItem;
            $item->count = 0;
        }
       
        $item->book_id = $book_id;
        $item->count++;
        
        $item->save();

        return redirect('/cart');
    }
}
