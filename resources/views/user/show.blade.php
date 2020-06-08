@extends('layouts.app')

@section('content')
<small>user>show.blade.php</small>
@if(Auth::user()->email !== env("ADMIN"))
<div class="alert alert-warning">
    <strong>Sorry!</strong> unauthorised access.
</div>                                      
@else
    <a href="/user" class="btn btn-outline-dark float-right">BACK</a>
    <h3>USER</h3>
    <div class="card card-body mb-1 text-center">
        <h5>
            {{-- <small class="text-danger">SELECTED</small> --}}
            <div class ="text-warning">{{$user->id}}</div>
            <div><i class="fas fa-envelope text-info"></i> <span class="text-default">{{$user->email}}</span></div>
            <h6><span class="text-success"><i class="far fa-clock"></i></span> <span class="text-secondary">{{$user->created_at}}</span><h6>
        </h5>
    </div>

    {{-- <a href="/user/{{$user->userID}}/edit" class="btn btn-secondary">EDIT</a> --}}
    {!!Form::open(['action' => ['UsersController@destroy', $user->id], 'method' => 'POST', 'class' => 'float-right'])!!}
    {{Form::hidden('_method', 'DELETE')}}
    {{Form::submit('Delete', ['class' => 'btn btn-outline-danger'])}}
    {!!Form::close()!!}

    @if(count($c) !== 0)
    <div class="alert alert-warning">
        <strong>Hey!</strong> This user is already a tech.
    </div>                                      
    @else

    <h3>MAKE A TECH</h3>
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

    {{Form::submit('Submit', ['class' => 'btn btn-outline-info float-right'])}}
    {!! Form::close() !!}

    @endif
@endif

@endsection