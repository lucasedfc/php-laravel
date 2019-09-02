<h1>Fruits(Action Controller)</h1>

<a href="{{action('FruitsController@getOranges')}}">Go to Oranges</a> 
<a href="{{action('FruitsController@getApples')}}">Go to Apples</a> 

<ul>
@foreach($fruits as $fruit)
    <li>{{$fruit}}</li>
@endforeach
</ul>