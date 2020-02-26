<h1>books:</h1>

  @foreach ($books as $book)
      <a href="http://books/books-orm/{{$book->id}}">{{$book->title}}</a>
      <form action="/cart/{{$book->id}}" method="GET">
        <input type="submit" value="Add to Cart">
      </form>
      <br>
  @endforeach