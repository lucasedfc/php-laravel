<h1>Fruits(Action Controller)</h1>

<a href="{{route('orangesAlias')}}">Go to Oranges</a> 
<a href="{{action('FruitsController@getApples')}}">Go to Apples</a> 

<ul>
@foreach($fruits as $fruit)
    <li>{{$fruit}}</li>
@endforeach
</ul>

<h1>Lavarel Form</h1>

<form action="{{url('/receive')}}" method="POST">

<p>
<label for="name">Fruit name</label>
<input type="text" name="name">
</p>

<p>
<label for="description">Fruit Description</label>
<textarea type="text" name="description"></textarea>
</p>

<input type="submit" value="send">
</form>