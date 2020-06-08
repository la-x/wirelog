@extends('layouts.app')

@section('content')
<small>job>create.blade.php</small>
@if(Auth::user()->email == env("ADMIN") OR $access == 'ICA')
    <a href="./" class="btn btn-primary float-right">BACK</a>
    <h1>ADD JOB</h1>
    {!! Form::open(['action' => 'JobsController@store', 'method' => 'Post', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::label('contractor', 'Contractor')}}
        {{Form::text('contractor', '', ['class' => 'form-control', 'placeholder' => 'Contractor'])}}
    </div>
    <div class="form-group">
        {{Form::label('location', 'Location')}}
        {{Form::text('location', '', ['class' => 'form-control', 'placeholder' => 'Location'])}}
    </div>
    <div class="form-group" hidden="hidden">
        {{Form::label('id', 'id')}}
        {{Form::text('id', Auth::user()->id, ['class' => 'form-control', 'placeholder' => 'id'])}}
    </div>
    <div class="form-group">
    </div>

    <div class="form-group">
        <div class="mb-2">Image</div>
        {{Form::file('cover_image')}}
    </div>
    <small class="text-danger">2MB maximum</small>

    {{Form::submit('Submit', ['class' => 'btn btn-primary float-right'])}}
{!! Form::close() !!}
@else <div class="alert alert-warning">
    <strong>Sorry!</strong> You have unauthorised access to add a job.
</div>
@endif
@endsection