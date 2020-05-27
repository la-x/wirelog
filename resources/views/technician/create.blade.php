@extends('layouts.app')

@section('content')
@if(Auth::user()->email == 'l.albert@wirelog.com.au')
    <a href="./" class="btn btn-primary float-right">BACK</a>
    <h1>ADD TECHNICIAN</h1><small>technician.create.blade.php</small>
    {!! Form::open(['action' => 'TechniciansController@store', 'method' => 'Post']) !!}

    {{-- <div class="form-group">
        {{Form::label('user', 'Username')}}
        {!! Form::select('id', $idUsername, null, ['class' => 'form-control']) !!}
    </div> --}}
    
    <div class="form-group">
        {{Form::label('name', 'Formal Name')}}
        {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name'])}}
    </div>

    <div class="form-group">
        {{Form::label('surname', 'Formal Surame')}}
        {{Form::text('surname', '', ['class' => 'form-control', 'placeholder' => 'Surame'])}}
    </div>
    {{-- <div class="form-group">
        {{Form::label('email', 'Company Email')}}
        {!! Form::select('email', $idEmail, null, ['class' => 'form-control']) !!}
    </div> --}}
    <div class="form-group">
        {{Form::label('phone', 'Company Phone')}}
        {{Form::text('phone', '', ['class' => 'form-control', 'placeholder' => 'Phone'])}}
    </div>
    <div class="form-group">
        {{Form::label('position', 'Position')}}
        {{Form::text('position', '', ['class' => 'form-control', 'placeholder' => 'Position'])}}
    </div>
    <div class="form-group">
        {{-- {{Form::file('coverImage')}} --}}
    </div>
    {{-- <div class="form-group">
        {{Form::label('id', 'id')}}
        {{Form::text('id', '', ['class' => 'form-control', 'placeholder' => 'id'])}}
    </div> --}}

    {{Form::submit('Submit', ['class' => 'btn btn-primary float-right'])}}
    {!! Form::close() !!}
@endif
@endsection