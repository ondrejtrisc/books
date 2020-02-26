<div>
  @foreach ($items as $item)
      {{$item->book->title}}<br>
      published by {{$item->book->publisher->title}}<br>
      count: {{$item->count}}<br>
      <hr>
  @endforeach
</div>