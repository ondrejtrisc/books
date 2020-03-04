<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Book;

class BookQueryBuilderController extends Controller
{
    public function index() {
        
        // $query = DB::table('books')
        //     ->limit(10)
        //     ->orderBy('title', 'asc');
        
        // $data = $query->get();

        // dd($data);

        $books = Book::query()
            ->orderBy('title', 'asc')
            ->with('publisher')
            ->paginate(100);
        //dd($books);

        return view('books/page', compact('books'));
    }
}
