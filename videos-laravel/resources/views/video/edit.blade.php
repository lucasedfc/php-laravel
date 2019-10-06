@extends('layouts.app')

@section('content')

    <div class='container'>
        <div class='row'>
        <h2>Edit {{$video->title}}</h2>
                <form action="{{ route('updateVideo', ['id' => $video->id]) }}" method="POST" enctype="multipart/form-data"
                class="col-lg-7">
                {!! csrf_field() !!}  
        
                @if($errors->any())
                    <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                    </div>
            
        
                @endif
                <div class="form-group">
                        <label for="title">Title</label>
                        <input id="title" type="text" class="form-control" name="title" value="{{$video->title}}">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="description" class="form-control" name="description">{{$video->description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                         <!-- Image Video-->
                         @if(Storage::disk('images')->has($video->image))
                         <div class="video-image-thumb">
                             <div class="video-image-mask">
                                 <img src="{{url('/thumbnail/'.$video->image)}}" class="video-image" alt="">
                             </div>
                         </div>
                         @endif
                        <input id="image" type="file" class="form-control" name="image">
                    </div>
                    <div class="form-group">
                        <label for="video">Video</label>
                        <video id="video-player" controls>
                        <source src="{{ route('videoFile', ['filename' => $video->video_path]) }}">  
                        Your browser does not support the video tag.
                        </video>
                        <input id="video" type="file" class="form-control" name="video">
                    </div>
        
                    <button type="submit" class="btn btn-success">Update Video</button>
                </form>
        </div>

    </div>

@endsection