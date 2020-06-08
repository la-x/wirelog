@extends('layouts.app')

@section('content')
<small>job_log>index.blade.php</small>
{{-- @if(Auth::user()->email !== 'l.albert@wirelog.com.au') --}}
@if(Auth::user()->email !== env("ADMIN"))
<div class="alert alert-warning">
    <strong>Sorry!</strong> You are unauthorised to view recent logs.
</div>                                      
@else
    <h3>MOST RECENT</h3>
    @if(count($allLogs) > 0)
        @foreach($allLogs as $allLogs)
            <div class="card card-body mb-1 text-center">
                <h5>
                    <i class="fas fa-edit text-info"></i> <span>{{$allLogs->comment}}</span>
                    <h6><span class="text-success"><i class="far fa-clock"></i></span> <span class="text-secondary">{{$allLogs->created_at}}</span><h6>
                    <h6><i class="fas fa-user text-primary"></i> {{$allLogs->name}} {{$allLogs->surname}} <span class="text-warning">{{$allLogs->position}}</span></h6> 
                    <h6><i class="fas fa-phone text-primary"></i> {{$allLogs->phone}}</h6>
                    <h6><i class="fas fa-envelope text-info"></i> {{$allLogs->email}}</h6>
                </h5>
            </div>
        @endforeach
    @else
    <div class="alert alert-secondary">
        No activity found.
    </div>
    @endif
@endif
@endsection