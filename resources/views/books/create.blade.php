<form action="/books-orm" method="post" enctype="multipart/form-data">
  @csrf
  <input type="text" name="title" placeholder="title"><br>
  <input type="text" name="authors" placeholder="authors"><br>
  {{-- <input type="text" name="image" placeholder="image"><br> --}}
  <input type="file" name="image_file"><br>
  publisher:
  <select name="publisher_id">
    @foreach ($publishers as $publisher)
      <option value={{$publisher->id}}>{{$publisher->title}}</option>
    @endforeach


    {{-- <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option> --}}
  </select><br>
  <input type="submit" value="sumbit">
</form>