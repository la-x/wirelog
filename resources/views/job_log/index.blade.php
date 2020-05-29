@extends('layouts.app')

@section('content')
    <h1>MOST RECENT</h1><small>job_log>index.blade.php</small>
    @if(count($allLogs) > 0)
        @foreach($allLogs as $allLogs)
            <div class="card card-body mb-1 text-center">
                <h6>
                    <i class="fas fa-wrench"></i>
                    <div class="fas fa-edit text-default">{{$allLogs->comment}}</div>
                    <div class="fas fa-edit text-primary">{{$allLogs->created_at}}</div>
                    <span class="fas fa-edit text-info">{{$allLogs->name}} {{$allLogs->surname}}</span>
                    <div class="fas fa-edit text-warning">{{$allLogs->position}}</div>
                    <div class="fas fa-edit text-success">{{$allLogs->phone}}</div>
                </h6>
            </div>
        @endforeach
    @else
        <p>No posts found</p>
    @endif
@endsection