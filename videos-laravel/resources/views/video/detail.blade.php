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
        <div class="panel panel-default video-data">
            <div class="panel-heading">
                <div class="panel-title">
                        Upload By: <strong><a href="{{route('channel', ['user_id' => $video->user->id])}}">{{$video->user->name. ' ' .$video->user->surname}}</a></strong> 
                        At {{\FormatTime::LongTimeFilter($video->created_at)}}
                </div>

            </div>

            <div class="panel-body">
                {{$video->description}}

            </div>
        </div>

        <!-- Comments -->
            @include('video.comments')
    </div>

</div>
@endsection