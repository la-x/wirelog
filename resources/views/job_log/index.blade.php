@extends('layouts.app')

@section('content')
    <h3>MOST RECENT</h3><small>job_log>index.blade.php</small>
    @if(count($allLogs) > 0)
        @foreach($allLogs as $allLogs)
            <div class="card card-body mb-1 text-center">
                <h5>
                    <i class="fas fa-wrench"></i>
                    <div class="fas fa-edit text-default">{{$allLogs->comment}}</div>
                    <span class="text-info">{{$allLogs->name}} {{$allLogs->surname}}</span><small class="fas fa-edit text-warning"> {{$allLogs->position}}</small>
                    <div class="fas fa-edit text-primary">{{$allLogs->email}}</div>
                    <small class="fas fa-edit text-info">{{$allLogs->phone}}</small>
                    <div><small class="text-success">created </small><small class="text-info">{{$allLogs->created_at}}</small></div>
                </h5>
            </div>
        @endforeach
    @else
    <div class="alert alert-secondary">
        No activity found.
    </div>
    @endif
@endsection