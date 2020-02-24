<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class BookORMController extends Controller
{
    public function index() {
        $books = Book::all();

        $view = view('/books/index', compact('books'));

        return $view;
    }

    public function show($id) {

        $book = Book::find($id);

        $view = view('/books/show', compact('book'));

        return $view;
    }
}
