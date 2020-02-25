<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publisher;
use App\Book;

class PublisherController extends Controller
{
    public function index() {
        $publishers = Publisher::all();

        $view = view('/publishers/index', compact('publishers'));

        return $view;
    }

    public function show($publisher_id) {

        $title = Publisher::findOrFail($publisher_id)->title;
        $books = Book::where('publisher_id', $publisher_id)->get();
        
        $view = view('/publishers/show', compact('title', 'books'));

        return $view;
    }

    public function create() {
        return view('publishers/create');
    }

    public function store(Request $request) {

        $p = new Publisher;
        $p->title = $request->input('title');
        $p->save();
        return $p;
    }
}
