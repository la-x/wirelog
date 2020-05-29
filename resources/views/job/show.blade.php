@extends('layouts.app')

@section('content')
    <a href="/job" class="btn btn-primary float-right">BACK</a>
    <h3>JOB</h3><small>job>show.blade.php</small>
    <div class="card card-body mb-1 text-center">
        <h5>
            <i class="fas fa-wrench"></i>
            <small class="text-danger">SELECTED</small>
            <div class ="text-warning">{{$job->jobID}}</div>
            <div class="text-default">{{$job->contractor}}<div>
            <div class="text-primary">{{$job->location}}</div>
            {{-- <small>created {{$job->created_at}}</small> --}}
            {{-- {{$user->username}} --}}
        </h5>
    </div>

    <hr>

    @if(Auth::user()->email == 'l.albert@wirelog.com.au')
    <a href="/job/{{$job->jobID}}/edit" class="btn btn-secondary">EDIT</a>
    {!!Form::open(['action' => ['JobsController@destroy', $job->jobID], 'method' => 'POST', 'class' => 'float-right'])!!}
    {{Form::hidden('_method', 'DELETE')}}
    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {!!Form::close()!!}
    <hr>
    @endif

    {{-- <hr>
    <h3 class="text-center">COMMENTS</h3>
    <hr> --}}

    @foreach ($te as $te)
    <div class="card card-body mb-1 text-center">
        <h5>
            <div class="fas fa-edit text-default">{{$te->comment}}</div>
            <div class="fas fa-edit text-info">{{$te->name}} {{$te->surname}}</div>
            <div class="fas fa-edit text-warning">{{$te->position}}</div>
            <div class="fas fa-edit text-primary">{{$te->phone}}</div>
            <div class="fas fa-edit text-info">{{$te->email}}</div>
            <small class="text-success">created </small><small class="fas fa-edit text-primary">{{$te->created_at}}</small>
        </h5>
    </div>
    @endforeach

    <hr>

    {!! Form::open(['action' => 'JobLogsController@store', 'method' => 'Post']) !!}
    <div class="form-group">
        {{-- {{Form::label('comment', 'Comment')}} --}}
        <h3>COMMENT</h3>
        {{Form::text('comment', '', ['class' => 'form-control', 'placeholder' => 'comment'])}}
    </div>
    {{-- <div class="form-group">
        {{Form::label('technicianID', 'technicianID')}}
        {{Form::text('technicianID', '', ['class' => 'form-control', 'placeholder' => 'technicianID'])}}
    </div> --}}

    <div class="form-group" hidden="hidden">
        {{Form::label('jobID', 'jobID')}}
        {{Form::text('jobID', $job->jobID, ['class' => 'form-control', 'placeholder' => 'jobID'])}}
    </div>
    
    <div class="form-group" hidden="hidden">
        {{Form::label('id', 'id')}}
        {{Form::text('id', Auth::user()->id, ['class' => 'form-control', 'placeholder' => 'id'])}}
    </div>
    {{Form::submit('Submit', ['class' => 'btn btn-primary float-right'])}}
    {!! Form::close() !!}

@endsection