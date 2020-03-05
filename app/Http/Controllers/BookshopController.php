<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bookshop;
use App\Book;

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

    public function show($id) {

        $bookshop = Bookshop::findOrFail($id);

        $books = Book::all();

        return view('/bookshop/show', compact('bookshop', 'books'));
    }

    public function addBook(Request $request, $id) {

        $bookshop = Bookshop::findOrFail($id);

        $book_id = $request->input('book_id');
        $count = $request->input('count');

        if ($bookshop->books()->find($book_id) === null) {
            $bookshop->books()->attach($book_id, ['count' => $count]);
        }
        else {
            $newCount = $bookshop->books()->find($book_id)->pivot->count + $count;
            $bookshop->books()->detach($book_id);
            $bookshop->books()->attach($book_id, ['count' => $newCount]);
        }

        return redirect(action('BookshopController@show', ['id' => $id]));
    }

    public function removeBook(Request $request, $id, $book_id) {

        $bookshop = Bookshop::findOrFail($id);

        $bookshop->books()->detach($book_id);

        return redirect(action('BookshopController@show', ['id' => $id]));
    }
}
