{{-- @extends('layouts.app')

@section('content')
    <a href="/technician" class="btn btn-primary float-right">BACK</a>
    <h1>TECHNICIAN</h1><small>show.blade.php</small>
    <div class="card card-body mb-1 text-center">
        <h4>
            <i class="fas fa-wrench"></i>
            <div class ="text-warning">{{$user->id}}</div></a>
        </h4>
    </div>



@endsection --}}

@extends('layouts.app')

@section('content')
<small>show.blade.php</small>
@if(Auth::user()->email !== env("ADMIN"))
<div class="alert alert-warning">
    <strong>Sorry!</strong> You have unauthorised access to view technicians.
</div>                                      
@else
    <a href="/technician" class="btn btn-outline-dark float-right">BACK</a>
    <h3>TECHNICIAN</h3>
    <div class="card card-body mb-1 text-center">
        <h5>
            {{-- <small class="text-danger">SELECTED</small> --}}
            <div class ="text-warning">{{$technician->technicianID}}</div></a>
            <h6><i class="fas fa-user text-primary"></i> {{$technician->name}} {{$technician->surname}} <span class="text-warning">{{$technician->position}}</span></h6>
            <h6><i class="fas fa-envelope text-info"></i> {{$technician->email}}</h6>
            <h6><i class="fas fa-phone text-primary"></i> {{$technician->phone}}</h6>
            <h6><span class="text-success"><i class="far fa-clock"></i></span> <span class="text-secondary">{{$technician->created_at}}</span></h6>
        </h5>
    </div>

    {{-- <div>{{$technician->technicianID}}</div>
    <div>{{$technician->name}}</div>
    <div>{{$technician->surname}}</div>
    <div>{{$technician->email}}</div>
    <div>{{$technician->phone}}</div>
    <div>{{$technician->position}}</div>
    <small>created {{$technician->created_at}}</small> --}}
    <hr>
    <a href="/technician/{{$technician->technicianID}}/edit" class="btn btn-outline-dark">EDIT</a>
    {!!Form::open(['action' => ['TechniciansController@destroy', $technician->technicianID], 'method' => 'POST', 'class' => 'float-right'])!!}
    {{Form::hidden('_method', 'DELETE')}}
    {{Form::submit('Delete', ['class' => 'btn btn-outline-danger'])}}
    {!!Form::close()!!}
@endif
@endsection