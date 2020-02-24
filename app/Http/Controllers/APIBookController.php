<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class APIBookController extends Controller
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

        header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
        echo json_encode($books);
    }
}
