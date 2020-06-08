@extends('layouts.app')

@section('content')
<small>job>edit.blade.php</small>
@if(Auth::user()->email == env("ADMIN") OR $access == 'ICA')
    <a href="./" class="btn btn-primary float-right">BACK</a>
    <h1>EDIT JOB</h1>
    {!! Form::open(['action' => ['JobsController@update', $job->jobID], 'method' => 'Post', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::label('contractor', 'Contractor')}}
        {{Form::text('contractor', $job->contractor, ['class' => 'form-control', 'placeholder' => 'Contractor'])}}
    </div>
    <div class="form-group">
        {{Form::label('location', 'Location')}}
        {{Form::text('location', $job->location, ['class' => 'form-control', 'placeholder' => 'Location'])}}
    </div>
    <div class="form-group" hidden="hidden">
        {{Form::label('id', 'id')}}
        {{Form::text('id', Auth::user()->id, ['class' => 'form-control', 'placeholder' => 'id'])}}
    </div>

    <div class="form-group">
        <div class="mb-2">Image</div>
        {{Form::file('cover_image')}}
    </div>
    <small class="text-danger">2MB maximum</small>

    {{Form::hidden('_method','PUT')}}
    {{Form::submit('Submit', ['class' => 'btn btn-primary float-right'])}}
    {!! Form::close() !!}
@else
<div class="alert alert-warning">
    <strong>Sorry!</strong> You have unauthorised access to edit jobs.
</div>
@endif

@endsection