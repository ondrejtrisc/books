<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bookshop;

class BookshopController extends Controller
{
    public function index() {

        $bookshops = Bookshop::all();

        return view('bookshop/index', compact('bookshops'));
    }
    
    public function create() {
        return view('/bookshop/create');
    }

    public function store(Request $request) {
        
        $this->validate($request, [
            'name' => 'required|max:255',
            'city' => 'required|max:255'
        ]);

        $bookshop = new Bookshop;
        $bookshop->fill($request->only('name', 'city'));

        $bookshop->save();

        session()->flash('success_message', 'Success!');

        return redirect(action('BookshopController@index'));
    }
}
