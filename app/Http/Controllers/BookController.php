<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class BookController extends Controller
{
    public function index() {

        if (!isset($_GET['page']) || $_GET['page'] <= 1) {
            $offset = 0;
        }
        else {
            $offset = ($_GET['page'] - 1) * 4;
        }

        $query = "
            SELECT *
            FROM `books`
            LIMIT {$offset}, 4
        ";

        $books = DB::select($query);
      
        // $view = view('books')
        //     ->with('name', $name)
        //     ->with('surname', $surname);

        // $view = view('books', ['name' => $name, 'surname' => $surname]);

        $view = view('books', compact('books'));

        return $view;
    }
}
