@extends('layouts.master')

@section('title', 'Hello')

@section('header')
@parent
<h1>Header from hello view</h1>
@stop

@section('content')
<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Libero voluptas impedit provident nulla dolores animi quaerat dolorem sint, ea est cupiditate itaque sunt nobis illum voluptatibus atque molestias laborum vero?</p>
@stop