<h1>Fruits(Action Controller)</h1>

<a href="{{action('FruitsController@oranges')}}">Go to Oranges</a> 
<a href="{{action('FruitsController@apples')}}">Go to Apples</a> 

<ul>
@foreach($fruits as $fruit)
    <li>{{$fruit}}</li>
@endforeach
</ul>