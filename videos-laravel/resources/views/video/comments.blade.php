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

                    </div>
                </div>
            </div>
            @endforeach
    </div>
    @endif