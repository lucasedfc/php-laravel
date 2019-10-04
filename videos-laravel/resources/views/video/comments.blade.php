<hr>
    <h4>Comments</h4>
<hr>
@if(session('message'))
    <div class="alert alert-success">
        {{session('message')}}
    </div>
@endif

@if(Auth::check())
<form action="{{ url('/comment') }}" class="col-md-4" method="POST">

{!! csrf_field() !!}

<input type="hidden" name="video_id" value="{{$video->id}}" required>
    <p>
        <label>
            <textarea class="form-control" name="body" required></textarea>
        </label>
    </p>

    <input type="submit" value="Comment" class="btn btn-success">
</form>
@endif

@if(isset($video->comments))
    <div class="clearfix"></div>
    <hr>
    <div id="comment-list">
        @foreach($video->comments as $comment)
            <div class="comment-item col-md-12 pull-left">
                <div class="panel panel-default comment-data">
                    <div class="panel-heading">
                        <div class="panel-title">
                            Upload By: <strong>{{$comment->user->name. ' ' .$comment->user->surname}}</strong>
                            At {{\FormatTime::LongTimeFilter($comment->created_at)}}
                        </div>

                    </div>

                    <div class="panel-body">
                        {{$comment->body}}

                    @if( Auth::check() && (Auth::user()->id == $comment->id || Auth::user()->id == $video->user->id))
                    <div class="pull-right clearfix">
                        <a href="#comment-modal{{$comment->id}}" role="button" class="btn btn-sm btn-danger" data-toggle="modal">Delete</a>
                        
                        <!-- Modal / Ventana / Overlay en HTML -->
                        <div id="comment-modal{{$comment->id}}" class="modal fade">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title">¿Are you sure?</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>¿Do you want to delete this comment?</p>
                                            <p class="text-warning"><small>{{$comment->body}}</small></p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-danger">Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                        </div>
  

                    @endif

                    </div>

                   
                </div>
            </div>
            @endforeach
    </div>
    @endif