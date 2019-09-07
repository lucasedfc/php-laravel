<h1>Notes Application</h1>

<h3>Notes List</h3>

<ul>
    @foreach($notes as $note)
        <li>
            <ul>
                <li>{{$note->title}}</li>
                <li><a href="{{url('/notes/note/'.$note->id)}}">View This Note</a></li>
            </ul>
        </li>
    @endforeach
</ul>