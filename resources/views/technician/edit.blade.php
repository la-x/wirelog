@extends('layouts.app')

@section('content')
@if(Auth::user()->email == 'l.albert@wirelog.com.au')
    <a href="./" class="btn btn-primary float-right">BACK</a>
    <h1>EDIT TECHNICIAN</h1><small>technician>edit.blade.php</small>
    {!! Form::open(['action' => ['TechniciansController@update', $technician->technicianID], 'method' => 'Post']) !!}
    {{-- <div class="form-group">
        {{Form::label('ID', 'ID')}}
        {!! Form::select('id', $idlist, null, ['class' => 'form-control']) !!}
    </div> --}}
    {{-- <label for="id">ID</label> --}}
    <input name="id" type="text" class="form-control" value="{{$technician->id}}" hidden="hidden"><div>
    <div class="form-group">
        {{Form::label('name', 'Formal Name')}}
        {{Form::text('name', $technician->name, ['class' => 'form-control', 'placeholder' => 'Name'])}}
    </div>
    <div class="form-group">
        {{Form::label('surname', 'Formal Surame')}}
        {{Form::text('surname', $technician->surname, ['class' => 'form-control', 'placeholder' => 'Surame'])}}
    </div>
    <div class="form-group">
        {{Form::label('email', 'Company Email')}}
        {{Form::text('email', $technician->email, ['class' => 'form-control', 'placeholder' => 'Email'])}}
    </div>
    <div class="form-group">
        {{Form::label('phone', 'Company Phone')}}
        {{Form::text('phone', $technician->phone, ['class' => 'form-control', 'placeholder' => 'Phone'])}}
    </div>
    <div class="form-group">
        {{Form::label('position', 'Position')}}
        {{Form::text('position', $technician->position, ['class' => 'form-control', 'placeholder' => 'Position'])}}
    </div>
    <div class="form-group">
        {{-- {{Form::file('coverImage')}} --}}
    </div>
    {{Form::hidden('_method','PUT')}}
    {{Form::submit('Submit', ['class' => 'btn btn-primary float-right'])}}
    {!! Form::close() !!}
@endif
@endsection