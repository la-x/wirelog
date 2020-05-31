@extends('layouts.app')

@section('content')
{{-- <small>job_log>index.blade.php</small> --}}
    <h3>MOST RECENT</h3>
    @if(count($allLogs) > 0)
        @foreach($allLogs as $allLogs)
            <div class="card card-body mb-1 text-center">
                <h5>
                    <i class="fas fa-wrench"></i>
                    <div class="fas fa-edit text-default">{{$allLogs->comment}}</div>
                    <h6 class="text-info">{{$allLogs->name}} {{$allLogs->surname}}</h6>
                    <h6 class="fas fa-edit text-primary">{{$allLogs->email}}</h6>
                    <h6 class="fas fa-edit text-info">{{$allLogs->phone}}</h6>
                    <h6 class="fas fa-edit text-warning"> {{$allLogs->position}}</h6>
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