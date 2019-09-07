<h1>Notes Application</h1>

<a href="{{url('/notes/save-note')}}">Add Note</a>

@if(session('status'))
    <p style="background: red">
        {{session('status')}}
    </p>
        
@endif
<h3>Notes List</h3>

<ul>
    @foreach($notes as $note)
        <li>
            <ul>
                <li>{{$note->title}}</li>
                <li><a href="{{url('/notes/note/'.$note->id)}}">View This Note</a></li>
                <li><a href="{{url('/notes/delete-note/'.$note->id)}}">Delete This Note</a></li>
                <li><a href="{{url('/notes/update-note/'.$note->id)}}">Edit This Note</a></li>
            </ul>
        </li>
    @endforeach
</ul>