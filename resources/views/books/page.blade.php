<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  
  @foreach ($books as $book)
      
    <div class="book">
      <h2>{{$book->title}}</h2>
      By {{$book->authors}}
    </div>

  @endforeach

  {{$books->links()}}

</body>
</html>