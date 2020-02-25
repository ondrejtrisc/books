<form action="/books-orm/{{$book->id}}/edit" method="post">
  @csrf
  <input type="text" name="title" value="{{$book->title}}"><br>
  <input type="text" name="authors" value="{{$book->authors}}"><br>
  <input type="text" name="image" value="{{$book->image}}"><br>
  publisher:
  <select name="publisher_id">
    @foreach ($publishers as $publisher)
      <option value={{$publisher->id}}>{{$publisher->title}}</option>
    @endforeach
  </select><br>
  <input type="submit" value="sumbit">
</form>