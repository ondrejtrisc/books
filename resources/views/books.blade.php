<h1>books:</h1>

  @foreach ($books as $book)
      <img src={{$book->image}}><br>
      {{$book->title}}<br>
      by {{$book->authors}}<br>
  @endforeach
