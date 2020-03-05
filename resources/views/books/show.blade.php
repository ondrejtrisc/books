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

<h2>Bookshops:</h2>
<ul>
    @foreach ($book->bookshops as $bookshop)
      <li>
        <form action="{{action('BookORMController@removeBookshop', ['id' => $book->id, 'bookshop_id' => $bookshop->id])}}" method="POST">
          @csrf
          {{$bookshop->name}}
          @auth
            <input type="submit" value="Remove">
          @endauth
        </form>
      </li>
    @endforeach
</ul>

@auth

    <form action="{{action('BookORMController@addBookshop', ['id' => $book->id])}}" method="post">
        @csrf
        <select name="bookshop_id" id="">
            @foreach ($bookshops as $bookshop)
            <option value="{{$bookshop->id}}">{{$bookshop->name}}</option>
            @endforeach
        </select>
        <button type="submit">Add</button>
    </form>
    

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

@endauth

@guest
    <h2>Please <a href="{{route('login')}}">login</a> to leave a review.</h2>
@endguest

<h2>Reviews:</h2>
<ul>
@foreach ($book->reviews as $review)
    <li>
        {{$review->review}}<br>
        -- {{$review->user->name}}

        @can('admin')
            <form action="{{action('ReviewController@delete', $review->id)}}" method="post">
                @method('delete')
                @csrf
                <input type="submit" value="delete">
            </form>
        @endcan       
    </li>
@endforeach
</ul>