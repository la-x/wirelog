@extends('layouts.app')

@section('content')
    <a href="/job" class="btn btn-primary float-right">BACK</a>
    <h1>JOB</h1><small>job>show.blade.php</small>
    <div class="card card-body mb-1 text-center">
        <h4>
            <i class="fas fa-wrench"></i>
            <div class="text-danger">SELECTED</div>
            <div class ="text-warning">{{$job->jobID}}</div></a>
            <div class="text-default">{{$job->contractor}}<div>
            <div class="text-primary">{{$job->location}}</div>
            {{-- <small>created {{$job->created_at}}</small> --}}
            {{-- {{$user->username}} --}}
        </h4>
    </div>

    {{-- @foreach ($job_log as $job_log)
    <div class="card card-body mb-1 text-center">
        <div><i class="fas fa-edit text-success"></i> {{$job_log->comment}}</div>
        <div><i class="fas fa-calendar-day text-primary"></i> {{$job_log->timestamp}}</div>
        <div><i class="fas fa-user text-info"></i> {{$job_log->name}} {{$job_log->surname}} <span class="text-warning">{{$job_log->position}}</span></div>
        <div><i class="fas fa-phone-alt text-info"></i> {{$job_log->phone}}</div>
    </div>
    @endforeach --}}

    <hr>
    @if(Auth::user()->email == 'l.albert@wirelog.com.au')
    <a href="/job/{{$job->jobID}}/edit" class="btn btn-secondary">EDIT</a>
    {!!Form::open(['action' => ['JobsController@destroy', $job->jobID], 'method' => 'POST', 'class' => 'float-right'])!!}
    {{Form::hidden('_method', 'DELETE')}}
    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {!!Form::close()!!}
    @endif
    <hr>
    <h1>COMMENT</h1>
    {!! Form::open(['action' => 'JobLogsController@store', 'method' => 'Post']) !!}
    <div class="form-group">
        {{Form::label('comment', 'Comment')}}
        {{Form::text('comment', '', ['class' => 'form-control', 'placeholder' => 'comment'])}}
    </div>
    <div class="form-group" hidden="hidden">
        {{Form::label('jobID', 'jobID')}}
        {{Form::text('jobID', $job->jobID, ['class' => 'form-control', 'placeholder' => 'jobID'])}}
    </div>
    {{-- <div class="form-group">
        {{Form::label('technicianID', 'technicianID')}}
        {{Form::text('technicianID', '', ['class' => 'form-control', 'placeholder' => 'technicianID'])}}
    </div> --}}
    <div class="form-group" hidden="hidden">
        {{Form::label('id', 'id')}}
        {{Form::text('id', Auth::user()->id, ['class' => 'form-control', 'placeholder' => 'id'])}}
    </div>
    {{Form::submit('Submit', ['class' => 'btn btn-primary float-right'])}}
    {!! Form::close() !!}

@endsection