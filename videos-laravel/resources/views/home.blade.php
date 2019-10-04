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
                            <h4 class="video-title"><a href="{{route('videoDetail', ['video_id' => $video->id])}}">{{$video->title}}</a></h4>
                            <p>{{$video->user->name.' '.$video->user->surname}}</p>
                        </div>

                        <!-- Button Action -->
                        <a href="{{route('videoDetail', ['video_id' => $video->id])}}" class="btn btn-success">View</a>
                        @if(Auth::check() && Auth::user()->id == $video->user->id) 
                        <a href="" class="btn btn-warning">Edit</a>
                        <a href="#video-modal{{$video->id}}" role="button" class="btn btn-danger" data-toggle="modal">Delete</a>
                        
                        <!-- Modal / Ventana / Overlay en HTML -->
                        <div id="video-modal{{$video->id}}" class="modal fade">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title">¿Are you sure?</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>¿Do you want to delete this video?</p>
                                            <p class="text-warning"><small>{{$video->title}}</small></p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <a href="{{url('/delete-video/'.$video->id)}}" type="button" class="btn btn-danger">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
