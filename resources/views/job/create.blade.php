@extends('layouts.app')

@section('content')
@if(Auth::user()->email == 'l.albert@wirelog.com.au')
    <a href="./" class="btn btn-primary float-right">BACK</a>
    <h1>ADD JOB</h1><small>create.blade.php</small>
    {!! Form::open(['action' => 'JobsController@store', 'method' => 'Post']) !!}
    <div class="form-group">
        {{Form::label('contractor', 'Contractor')}}
        {{Form::text('contractor', '', ['class' => 'form-control', 'placeholder' => 'Contractor'])}}
    </div>
    <div class="form-group">
        {{Form::label('location', 'Location')}}
        {{Form::text('location', '', ['class' => 'form-control', 'placeholder' => 'Location'])}}
    </div>
    <div class="form-group">
    </div>
    {{Form::submit('Submit', ['class' => 'btn btn-primary float-right'])}}
{!! Form::close() !!}
@endif
@endsection