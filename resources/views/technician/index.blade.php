@extends('layouts.app')

@section('content')
{{-- <small>technician>index.blade.php</small> --}}

    @if(count($b) == 0)
    <div class="alert alert-warning">
        <strong>Sorry!</strong> You need to be a tech before you see these details.
    </div>
    @else

    @if(Auth::user()->email == 'l.albert@wirelog.com.au')
    <a href="/technician/create" class="btn btn-primary float-right">ADD TECH</a>
    @endif
    <h3>TECHNICIANS</h3>
    @if(count($technician) > 0)
        @foreach($technician as $technician)
        <div class="card card-body mb-1 text-center">
            <h5>
                <i class="fas fa-wrench"></i>
                @if(Auth::user()->email == 'l.albert@wirelog.com.au')
                    <a href="/technician/{{$technician->technicianID}}">
                @endif<div class ="text-warning">{{$technician->technicianID}}</div></a>
                <div class="text-default">{{$technician->name}} {{$technician->surname}}<div>
                <div class ="text-primary">{{$technician->email}}</div></a>
                <div class="text-primary">{{$technician->phone}}<div>
                <div class="text-warning">{{$technician->position}}</div>
                <small class="text-success">created </small><small class="text-info">{{$technician->created_at}}</small>
            </h5>
        </div>
            {{-- <div class="card p-3 mt-3 mb-3">
            <h3><a href="/technician/{{$technician->technicianID}}">{{$technician->technicianID}} {{$technician->name}} {{$technician->surname}} {{$technician->email}} {{$technician->phone}} {{$technician->position}}</a></h3>
            <small>created {{$technician->created_at}}</small>  --}}
            
            {{-- <h3>Contractor: {{$job->contractor}}</h3>
            <h3>Location: {{$job->location}}</h3> --}}
        @endforeach

    @else
    <div class="alert alert-secondary">
        No technicians found.
    </div>
    @endif

    @endif
@endsection