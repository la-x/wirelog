@extends('layouts.app')

@section('content')
<small>technician>index.blade.php</small>

    @if(count($b) == 0)
    <div class="alert alert-warning">
        <strong>Sorry!</strong> You need to be a tech before you see these details.
    </div>
    @else

    {{-- @if(Auth::user()->email == 'l.albert@wirelog.com.au')
    <a href="/technician/create" class="btn btn-primary float-right">ADD TECH</a>
    @endif --}}
    
    <h3>TECHNICIANS</h3>
    @if(count($technician) > 0)
        @foreach($technician as $technician)
        <div class="card card-body mb-1 text-center">
            <h5>
                @if(Auth::user()->email == env("ADMIN"))
                    <a href="/technician/{{$technician->technicianID}}">
                @endif<div class ="text-warning">{{$technician->technicianID}}</div></a>
                {{-- <i class="fas fa-hard-hat text-secondary"></i> --}}
                <div><i class="fas fa-user text-primary"></i> {{$technician->name}} {{$technician->surname}} <span class="text-warning">{{$technician->position}}</span></div>
                <h6><i class="fas fa-phone text-primary"></i> {{$technician->phone}}</h6>
                <h6><i class="fas fa-envelope text-info"></i> {{$technician->email}}</h6>
                <h6><span class="text-success"><i class="far fa-clock"></i></span> <span class="text-secondary">{{$technician->created_at}}</span></h6>
            </h5>
        </div>          
            
        @endforeach

    @else
    <div class="alert alert-secondary">
        No technicians found.
    </div>
    @endif

    @endif
@endsection