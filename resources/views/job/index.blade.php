@extends('layouts.app')

@section('content')
    @if(Auth::user()->email == 'l.albert@wirelog.com.au')
    <a href="/job/create" class="btn btn-primary float-right">ADD JOB</a>
    @endif
    <h3>JOBS</h3><small>job>index.blade.php</small>
    @if(count($job) > 0)
        @foreach($job as $job)
            <div class="card card-body mb-1 text-center">
                <h5>
                    <i class="fas fa-wrench"></i>
                    <a href="/job/{{$job->jobID}}"><div class ="text-warning">{{$job->jobID}}</div></a>
                    <div class="text-default">{{$job->contractor}}<div>
                    <div class="text-primary">{{$job->location}}</div>
                    <small class="text-success">created </small><small class="text-info">{{$job->created_at}}</small>
                </h5>
            </div>
            {{-- <div class="card p-3 mt-3 mb-3">
            <h3><a href="/job/{{$job->jobID}}">{{$job->jobID}} {{$job->contractor}} {{$job->location}}</a></h3>
            <small>created {{$job->created_at}}</small>  --}}
            
            {{-- <h3>Contractor: {{$job->contractor}}</h3>
            <h3>Location: {{$job->location}}</h3> --}}

        @endforeach

    @else
        <p>No posts found</p>
    @endif

@endsection