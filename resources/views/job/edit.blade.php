@extends('layouts.app')

@section('content')
@if(Auth::user()->email == 'l.albert@wirelog.com.au')
    <a href="./" class="btn btn-primary float-right">BACK</a>
    <h1>EDIT JOB</h1><small>job>edit.blade.php</small>
    {!! Form::open(['action' => ['JobsController@update', $job->jobID], 'method' => 'Post']) !!}
    <div class="form-group">
        {{Form::label('contractor', 'Contractor')}}
        {{Form::text('contractor', $job->contractor, ['class' => 'form-control', 'placeholder' => 'Contractor'])}}
    </div>
    <div class="form-group">
        {{Form::label('location', 'Location')}}
        {{Form::text('location', $job->location, ['class' => 'form-control', 'placeholder' => 'Location'])}}
    </div>
    <div class="form-group">
        {{-- {{Form::file('coverImage')}} --}}
    </div>
    {{Form::hidden('_method','PUT')}}
    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endif
@endsection