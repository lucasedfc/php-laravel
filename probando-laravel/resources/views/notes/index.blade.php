<h1>Notes Application</h1>

<h3>Notes List</h3>

<ul>
    @foreach($notes as $note)
        <li>{{$note->title}}</li>
    @endforeach
</ul>