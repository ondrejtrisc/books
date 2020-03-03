<img src={{$book->image}}><br>
{{$book->title}}<br>
by {{$book->authors}}<br>
@if ($book->publisher !== null)
    published by: {{$book->publisher->title}}<br>
@else
published by: unknown<br>
@endif
<a href="http://books/books-orm">back</a><br>
<br>

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(Session::has('success_message'))
    <div class="alert alert-success">
        {{ Session::get('success_message') }}
    </div>
@endif

Your review:<br>
<form action="{{action('ReviewController@store', ['book_id' => $book->id])}}" method="post">
  @csrf
  <textarea name="review" id="" cols="30" rows="10"></textarea><br>
  <input type="submit" value="submit">
</form>
<h2>Reviews:</h2>
<ul>
@foreach ($book->reviews as $review)
    <li>{{$review->review}}</li>
@endforeach
</ul>