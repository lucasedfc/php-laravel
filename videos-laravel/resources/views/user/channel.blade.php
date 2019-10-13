@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="container">
                <h2>Channel from: {{$user->name.' '.$user->surname}}</h2>

            <div class="clearfix"></div>

            @include('video.videosList')
        </div>

    </div>
</div>
@endsection
