<?php

use Illuminate\Database\Seeder;
use App\Book;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $source_file = storage_path('books.json');

        $data = json_decode(file_get_contents($source_file), true);

        foreach ($data as $book_data) {
            $book = new Book;
            $book->publisher_id = 0;
            $book->title = $book_data['title'];
            $book->authors = $book_data['author'];
            $book->image = $book_data['image'];
            $book->save();
        }
    }
}
