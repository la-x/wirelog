@extends('layouts.app')

@section('content')
<small>job>index.blade.php</small>
    @if(Auth::user()->email == env("ADMIN") OR $access == 'ICA')
    <a href="/job/create" class="btn btn-outline-dark float-right">ADD JOB</a>
    @endif
    <h3>JOBS</h3>
    @if(count($job) > 0)
        @foreach($job as $job)
            {{-- <div class="card card-body mb-1 text-center">
                <h5>
                    <i class="fas fa-wrench"></i>
                    <a href="/job/{{$job->jobID}}"><div class ="text-warning">{{$job->jobID}}</div></a>
                    <div class="text-default">{{$job->contractor}}<div>
                    <div class="text-primary">{{$job->location}}</div>
                    <small class="text-success">created </small><small class="text-info">{{$job->created_at}}</small>
                </h5>
            </div> --}}

            <div class="card card-body mb-1 text-center">
                <h5>
                    <div class="row">
                        <div class="col-md-12">
                            <img style="width:100px" src="/storage/cover_images/{{$job->cover_image}}" alt="">
                        </div>
                        <div class="col-md-12">
                            <a href="/job/{{$job->jobID}}"><div class ="text-warning">{{$job->jobID}}</div></a>
                            <i class="fas fa-wrench text-secondary"></i>
                            <div class="text-default">{{$job->contractor}}<div>
                            <div class="text-info">{{$job->location}}</div>
                            <small class="text-success"><i class="far fa-clock"></i></small> <small class="text-secondary">{{$job->created_at}}</small>
                        </div>
                    </div>
                </h5>
            </div>
        @endforeach

    @else
    <div class="alert alert-secondary">
        No Jobs found.
    </div>
    @endif

@endsection