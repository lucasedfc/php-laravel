@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="container">
            @if(session('message'))
                <div class="alert alert-success">
                    {{session('message')}}
                </div>
            @endif

            <div id="videos-list">
            @foreach($videos as $video)

                <div class="video-item col-md-10 pull-left panel panel-default">
                    <div class="panel-body">
                        <!-- Image Video-->
                        @if(Storage::disk('images')->has($video->image))
                        <div class="video-image-thumb col-md-3 pull-left">
                            <div class="video-image-mask">
                                <img src="{{url('/thumbnail/'.$video->image)}}" class="video-image" alt="">
                            </div>
                        </div>
                        @endif

                        <div class="data">
                            <h4 class="video-title"><a href="">{{$video->title}}</a></h4>
                            <p>{{$video->user->name.' '.$video->user->surname}}</p>
                        </div>

                        <!-- Button Action -->
                        <a href="" class="btn btn-success">View</a>
                        @if(Auth::check() && Auth::user()->id == $video->user->id) 
                        <a href="" class="btn btn-warning">Edit</a>
                        <a href="" class="btn btn-danger">Delete</a>
                        @endif
                    </div>
                </div>
            @endforeach
            </div>
        </div>

        {{$videos->links()}}
    </div>
</div>
@endsection
