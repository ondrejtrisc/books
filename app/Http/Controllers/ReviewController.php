<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;

class ReviewController extends Controller
{
    public function store(Request $request, $book_id) {
        
        $this->validate($request, ['review' => 'required|max:255']);
        
        $review = new Review;
        $review->book_id = $book_id;
        $review->review = $request->input('review');
        $review->save();

        session()->flash('success_message', 'Success!');

        return redirect(action('BookORMController@show', ['id' => $book_id]));
    }
}
