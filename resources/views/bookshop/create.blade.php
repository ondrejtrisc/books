<h2>Create a bookshop:</h2>

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

<form action="{{action('BookshopController@store')}}" method="post">
  @csrf
  <input type="text" name="name" placeholder="name"><br>
  <input type="text" name="city" placeholder="city"><br>
  <input type="submit" value="create">
</form>