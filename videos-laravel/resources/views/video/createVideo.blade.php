@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <h2>Create Video</h2>
        <form action="{{ route('saveVideo') }}" method="POST" ectype="multipart/form-data"
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
                <input id="title" type="text" class="form-control" name="title" value="{{old('title')}}">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" class="form-control" name="description">{{old('description')}}</textarea>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input id="image" type="file" class="form-control" name="image">
            </div>
            <div class="form-group">
                <label for="video">Video</label>
                <input id="video" type="file" class="form-control" name="video">
            </div>

            <button type="submit" class="btn btn-success">Upload Video</button>
        </form>
    </div>
</div>
@endsection