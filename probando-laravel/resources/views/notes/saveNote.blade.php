<h1>
@if(!isset($note))
    Create Note
@else 
    Update note
@endif
</h1>
<form action="{{ isset($note) ? url('/notes/update-note/'.$note->id) : url('/notes/note')     }}" method="POST">
 
    <input type="text" name="title" placeholder="Titulo de la nota" value="{{isset($note) ? $note->title : ''}}"><br/>
    <input name="description" placeholder="Description" value="{{ isset($note) ? $note->description : ''}}"><br/>
    <input type="submit" value="Guardar">
 
</form>
<a href="{{url('/notes')}}">Get Back</a>