<h1>{{$bookshop->name}}</h1>
<h2>{{$bookshop->city}}<h2>

<h3>Books:</h3>
<ul>
@foreach ($bookshop->books as $book)
  <li>
    <form action="{{action('BookshopController@removeBook', ['id' => $bookshop->id, 'book_id' => $book->id])}}" method="POST">
      @csrf
      {{$book->title}}<br>
      count: {{$book->pivot->count}}
      <input type="submit" value="Remove">
    </form>
  </li>
@endforeach
</ul>
<form action="{{action('BookshopController@addBook', ['id' => $bookshop->id])}}" method="post">
  @csrf
  <select name="book_id" id="">
    @foreach ($books as $book)
      <option value="{{$book->id}}">{{$book->title}}</option>
    @endforeach
  </select>
  <input type="number" name="count" value="0">
  <button type="submit">Add</button>
</form>
