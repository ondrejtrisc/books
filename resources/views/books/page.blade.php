<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>

  {{$books->links()}}
  
  @foreach ($books as $book)
      
    <div class="book">
      <h2>{{$book->title}}</h2>
      by {{$book->authors}}<br>
      @if ($book->publisher)
        published by {{$book->publisher->title}}
      @endif
    </div>

  @endforeach

  {{$books->links()}}

</body>
</html>