{{-- Comment on server side --}}
<?php // Another comment on server side ?>
<!-- Comment on html -->
<h2>Hi {{$name}}</h2>

<h3>Age: {{--isset($age) && !is_null($age) ? $age : 'No se informo edad'--}}</h3>

{{-- Conditional --}}
@if(is_null($age))
    No existe la edad :/
@else
    Si existe la edad: {{$age}}
@endif
<h3>Otra sintaxis: {!!$name!!}</h3>
<h3>Otra sintaxis mas: <?=$age?></h3>