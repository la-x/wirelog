@extends('layouts.app')

@section('content')
    <h1>MOST RECENT</h1><small>job_log>index.blade.php</small>
    @if(count($job_log) > 0)
        @foreach($job_log as $job_log)
            <div class="card card-body mb-1 text-center">
                <h4>
                    <i class="fas fa-wrench"></i>
                    {{-- <a href="/job/{{$job_log->job_logID}}">job_logID --}}
                    <div class ="text-warning">{{$job_log->job_logID}}</div></a>
                    <div class="text-default">{{$job_log->comment}}<div>
                    <div class="text-primary">{{$job_log->updated_at}}<div>
                    <div class="text-success">jobID {{$job_log->jobID}}<div>
                    <div class="text-danger">userID {{$job_log->id}}</div>
                </h4>
            </div>
            {{-- <div>{{$t}}</div> --}}


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