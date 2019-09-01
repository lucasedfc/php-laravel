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

<p>
<?php $number = 3 ?>
Tabla del {{$number}}</p>

@for($i = 1; $i <= 10; $i++)
{{$i.' x '.$number.' ='.($i*$number)}}<br>
@endfor

<?php $f = 1 ?>
@while($f <=7)
    {{'Hi world'.$f}}<br>
    <?php $f++; ?>
@endwhile