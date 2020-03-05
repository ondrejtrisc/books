<h1>{{$bookshop->name}}</h1>
<h2>{{$bookshop->city}}<h2>

<h3>Books:</h3>
<form action="{{action('BookshopController@addBook', ['id' => $bookshop->id])}}" method="post">
  @csrf
  <select name="book_id" id="">
    @foreach ($books as $book)
      <option value="{{$book->id}}">{{$book->title}}</option>
    @endforeach
  </select>
  <button type="submit">Add</button>
</form>
