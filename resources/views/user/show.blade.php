@extends('layouts.app')

@section('content')
    <a href="/user" class="btn btn-primary float-right">BACK</a>
    <h1>USER</h1><small>user>show.blade.php</small>
    <div class="card card-body mb-1 text-center">
        <h4>
            <i class="fas fa-wrench"></i>
            <div class ="text-warning">{{$user->id}}</div></a>
            <div class="text-default">{{$user->email}}<div>
            <div class="text-primary">{{$user->created_at}}</div>
        </h4>
    </div>

    {{-- <a href="/user/{{$user->userID}}/edit" class="btn btn-secondary">EDIT</a> --}}
    {!!Form::open(['action' => ['UsersController@destroy', $user->id], 'method' => 'POST', 'class' => 'float-right'])!!}
    {{Form::hidden('_method', 'DELETE')}}
    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {!!Form::close()!!}


    <h1>MAKE A TECH</h1>
    {!! Form::open(['action' => 'TechniciansController@store', 'method' => 'Post']) !!}
    
    <div class="form-group">
        {{Form::label('name', 'Name')}}
        {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name'])}}
    </div>

    <div class="form-group">
        {{Form::label('surname', 'Surame')}}
        {{Form::text('surname', '', ['class' => 'form-control', 'placeholder' => 'Surame'])}}
    </div>

    <div class="form-group" hidden="hidden">
        {{Form::label('email', 'Email')}}
        {{Form::text('email', $user->email, ['class' => 'form-control', 'placeholder' => 'Email'])}}
    </div>

    <div class="form-group">
        {{Form::label('phone', 'Company Phone')}}
        {{Form::text('phone', '', ['class' => 'form-control', 'placeholder' => 'Phone'])}}
    </div>

    <div class="form-group">
        {{Form::label('position', 'Position')}}
        {{Form::text('position', '', ['class' => 'form-control', 'placeholder' => 'Position'])}}
    </div>

    <div class="form-group" hidden="hidden">
        {{Form::label('id', 'id')}}
        {{Form::text('id', $user->id, ['class' => 'form-control', 'placeholder' => 'id'])}}
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

@endsection