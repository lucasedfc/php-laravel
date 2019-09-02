<h1>Fruits(Action Controller)</h1>

<a href="{{route('orangesAlias')}}">Go to Oranges</a> 
<a href="{{action('FruitsController@getApples')}}">Go to Apples</a> 

<ul>
@foreach($fruits as $fruit)
    <li>{{$fruit}}</li>
@endforeach
</ul>