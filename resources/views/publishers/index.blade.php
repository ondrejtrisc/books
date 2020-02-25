<h1>Publishers:</h1>

  @foreach ($publishers as $publisher)
      <a href="http://books/publishers/{{$publisher->id}}">{{$publisher->title}}</a><br>
  @endforeach