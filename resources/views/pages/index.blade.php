pages>index.blade.php
@extends('layouts.app')

@section('content')
<div class="jumbotron text-center">
    <div class="jumbotron text-center">
        <h1>{{$title1}} {{$title2}}</h1>
        <p>HIIIII</p>
        <p><a class="btn btn-dark btn-lg" href="/login" role="button">Login</a> <a class="btn btn-dark btn-lg" href="/register" role="button">Register</a></p>
    </div>
</div>
@endsection