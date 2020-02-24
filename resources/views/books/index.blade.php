<h1>books:</h1>

  @foreach ($books as $book)
      <a href="http://books/books-orm/{{$book->id}}">{{$book->title}}</a><br>
  @endforeach