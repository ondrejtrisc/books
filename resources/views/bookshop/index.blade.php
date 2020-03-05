@if(Session::has('success_message'))
    <div class="alert alert-success">
        {{ Session::get('success_message') }}
    </div>
@endif

<a href="{{action('BookshopController@create')}}">Create new</a><br>

<h1>Bookshops:</h1>
<ul>
  @foreach ($bookshops as $bookshop)
      <li>{{$bookshop->name}} - {{$bookshop->city}}</li>
  @endforeach
</ul>