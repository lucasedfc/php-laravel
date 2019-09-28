@extends('layouts.app')

@section('content')
<div class="col-md-11 col-md-offset-1">
    <h2>{{$video->title}}</h2>
    <hr>
    <div class="col-md-8">
        <!-- Video -->
        <video id="video-player" controls>
        <source src="{{ route('videoFile', ['filename' => $video->video_path]) }}">    
        Your browser does not support the video tag.
        </video>
        <!-- Description --> 

        <!-- Comments -->
    </div>

</div>
@endsection