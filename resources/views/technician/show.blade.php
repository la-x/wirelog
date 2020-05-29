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
    <a href="/technician" class="btn btn-primary float-right">BACK</a>
    <h3>TECHNICIAN</h3><small>show.blade.php</small>
    <div class="card card-body mb-1 text-center">
        <h5>
            <small class="text-danger">SELECTED</small>
            <i class="fas fa-wrench"></i>
            <div class ="text-warning">{{$technician->technicianID}}</div></a>
            <div class="text-default">{{$technician->name}}<div>
            <div class="text-default">{{$technician->surname}}</div>
            <div class ="text-primary">{{$technician->email}}</div></a>
            <div class="text-primary">{{$technician->phone}}<div>
            <div class="text-warning">{{$technician->position}}</div>
            <small class="text-info">created {{$technician->created_at}}</small>
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
    <a href="/technician/{{$technician->technicianID}}/edit" class="btn btn-secondary">EDIT</a>
    {!!Form::open(['action' => ['TechniciansController@destroy', $technician->technicianID], 'method' => 'POST', 'class' => 'float-right'])!!}
    {{Form::hidden('_method', 'DELETE')}}
    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {!!Form::close()!!}

@endsection