<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Publisher;
use App\Bookshop;

class BookORMController extends Controller
{
    public function index() {
        $books = Book::all();

        $view = view('/books/index', compact('books'));

        return $view;
    }

    public function show($id) {

        $book = Book::find($id);
        // $publisher_name = Publisher::find($book->publisher_id)->title;

        $bookshops = Bookshop::all();

        $view = view('/books/show', compact('book', 'bookshops'));

        return $view;
    }

    public function create() {
        $publishers = Publisher::all();
        return view('/books/create', compact('publishers'));
    }

    public function store(Request $request) {
        
        if ($file = $request->file('image_file')) {
            $original_name = $file->getClientOriginalName();
            $file->storeAs('covers',   $original_name,  'uploads');
            // $request->file('image_file')->store('covers', 'uploads');
        }
        $book = new Book;

        $book->title = $request->input('title');
        $book->authors = $request->input('authors');
        // $book->image = $request->input('image');
        $book->image = '/uploads/covers/' . $original_name;
        $book->publisher_id = $request->input('publisher_id');

        $book->save();

        return redirect(action('BookORMController@show', ['id' => $book->id]));
    }

    public function edit($id) {
        $book = Book::find($id);
        $publishers = Publisher::all();
        return view('books/edit', compact('book', 'publishers'));
    }

    public function update(Request $request, $id) {
        $book = Book::findOrFail($id);
        $book->title = $request->input('title');
        $book->authors = $request->input('authors');
        $book->image = $request->input('image');
        $book->publisher_id = $request->input('publisher_id');

        $book->save();

        return redirect('/books-orm/' . $book->id);
    }

    public function delete($id) {
        $book = Book::find($id);
        
        $book->delete();

        return redirect('/books-orm');
    }

    public function addBookshop(Request $request, $id) {

        $book = Book::findOrFail($id);

        $bookshop_id = $request->input('bookshop_id');

        if ($book->bookshops()->find($bookshop_id) === null) {
            $book->bookshops()->attach($bookshop_id);
        }

        return redirect(action('BookORMController@show', ['id' => $id]));
    }

    public function removeBookshop(Request $request, $id, $bookshop_id) {

        $book = Book::findOrFail($id);

        $book->bookshops()->detach($bookshop_id);

        return redirect(action('BookORMController@show', ['id' => $id]));
    }
}
