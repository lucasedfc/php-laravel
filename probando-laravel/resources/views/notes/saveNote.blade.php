<h1>Create Note</h1>
<form action="{{url('/notes/note')}}" method="POST">
 
    <input type="text" name="title" placeholder="Titulo de la nota"><br/>
    <textarea name="description" placeholder="Descripcion"></textarea><br/>
    <input type="submit" value="Guardar">
 
</form>
<a href="{{url('/notes')}}">Get Back</a>