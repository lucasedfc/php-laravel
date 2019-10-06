<div id="videos-list">
        @if(count($videos) >= 1)
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
                    <a href="{{route('videoDetail', ['video_id' => $video->id])}}" title="Play" class="btn btn-success"><i class="fa fa-play"></i></a>
                    @if(Auth::check() && Auth::user()->id == $video->user->id) 
                    <a href="{{route('videoEdit', ['video_id' => $video->id])}}" class="btn btn-warning"><i class="fa fa-edit" title="Edit"></i></a>
                    <a href="#video-modal{{$video->id}}" role="button" title="Delete" class="btn btn-danger" data-toggle="modal"><i class="fa fa-trash"></i></a>
                    
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

            @else 
            <div class="alert alert-warning">
                No video to show
            </div>
        @endif

            <div class="clearfix">

            </div>
            {{$videos->links()}}
        </div>