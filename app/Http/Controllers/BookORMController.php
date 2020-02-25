<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Publisher;

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

        $view = view('/books/show', compact('book'));

        return $view;
    }

    public function create() {
        $publishers = Publisher::all();
        return view('/books/create', compact('publishers'));
    }

    public function store(Request $request) {
        $book = new Book;
        $book->title = $request->input('title');
        $book->authors = $request->input('authors');
        $book->image = $request->input('image');
        $book->publisher_id = $request->input('publisher_id');

        $book->save();

        return $book;
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
}
