@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="container">
            <div class="col-md-4">
                <h2>Search: {{$search}}</h2>
                <br>
            </div>
            <div class="col-md-8">

                <form action="{{url('/search/'.$search)}}" method="GET" class="col-md-3 pull-right">
                    <label for="filter">Order</label>
                    <select name="filter" class="form-control">
                        <option value="new">Newer</option>
                        <option value="old">Older</option>
                        <option value="alfa">From A to Z</option>
                    </select>
                    <input type="submit" value="Order" class="filter btn btn-sm btn-primary">
                </form>
            </div>
            <div class="clearfix"></div>

            @include('video.videosList')
        </div>

    </div>
</div>
@endsection
