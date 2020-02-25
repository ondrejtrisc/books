<h1>Books by {{$title}}:</h1>
<div style="display: flex; flex-direction: row; align-items: center; text-align: center;">
    @foreach ($books as $book)
      <div style="padding: 2rem;">
        <img src={{$book->image}}><br>
        {{$book->title}}<br>
        by {{$book->authors}}<br><br>
      </div>
    @endforeach
</div>
<a href="http://books/publishers"><h2>back</h2></a>


