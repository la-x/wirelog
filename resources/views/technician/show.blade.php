@extends('layouts.app')

@section('content')
    <a href="/technician" class="btn btn-primary float-right">BACK</a>
    <h1>TECHNICIAN</h1><small>show.blade.php</small>
    <div class="card card-body mb-1 text-center">
        <h4>
            <i class="fas fa-wrench"></i>
            <div class ="text-warning">{{$user->id}}</div></a>
        </h4>
    </div>

    {{-- <hr>
    <a href="/technician/{{$technician->technicianID}}/edit" class="btn btn-secondary">EDIT</a>
    {!!Form::open(['action' => ['TechniciansController@destroy', $technician->technicianID], 'method' => 'POST', 'class' => 'float-right'])!!}
    {{Form::hidden('_method', 'DELETE')}}
    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {!!Form::close()!!} --}}

@endsection