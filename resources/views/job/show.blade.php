@extends('layouts.app')

@section('content')
{{-- <small>job>show.blade.php</small> --}}
    <a href="/job" class="btn btn-primary float-right">BACK</a>
    <h3>JOB</h3>
    {{-- <div class="card card-body mb-1 text-center">
        <h5>
            <i class="fas fa-wrench"></i>
            <small class="text-danger">SELECTED</small>
            <div class ="text-warning">{{$job->jobID}}</div>
            <div class="text-default">{{$job->contractor}}<div>
            <div class="text-primary">{{$job->location}}</div>
        </h5>
    </div> --}}
    <div class="card card-body mb-1 text-center">
        <h5>
            <div class="row">
                <div class="col-md-12">
                    <a href="/storage/cover_images/{{$job->cover_image}}">
                        <img style="width:100px" src="/storage/cover_images/{{$job->cover_image}}" alt="">
                    </a>
                </div>
                <div class="col-md-12">
                    <i class="fas fa-wrench"></i>
                    <small class="text-danger">SELECTED</small>
                    {{-- <a href="/job/{{$job->jobID}}"> --}}
                        <div class ="text-warning">{{$job->jobID}}</div>
                    {{-- </a> --}}
                    <div class="text-default">{{$job->contractor}}<div>
                    <div class="text-primary">{{$job->location}}</div>
                    <small class="text-success">created </small><small class="text-info">{{$job->created_at}}</small>
                </div>
            </div>
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
            @if(count($b) == 0)
            <div class="alert alert-warning">
                <strong>Sorry!</strong> You need to be a tech before you can see these details.
            </div>                                      
            @else
            <div class="fas fa-edit text-info">{{$te->name}} {{$te->surname}}</div>
            <div class="fas fa-edit text-warning">{{$te->position}}</div>
            <div class="fas fa-edit text-primary">{{$te->phone}}</div>
            <div class="fas fa-edit text-info">{{$te->email}}</div>
            @endif
            <small class="text-success">created </small><small class="fas fa-edit text-primary">{{$te->c_at}}</small>
        </h5>
    </div>
    @endforeach

    <hr>

    @if(count($b) == 0)
    <div class="alert alert-warning">
        <strong>Sorry!</strong> You need to be a tech before you can comment.
    </div>                                      
    @else

    @foreach($b as $b)
    {!! Form::open(['action' => 'JobLogsController@store', 'method' => 'Post']) !!}
    <div class="form-group">
        {{-- {{Form::label('comment', 'Comment')}} --}}
        <h3>COMMENT</h3>
        {{Form::text('comment', '', ['class' => 'form-control', 'placeholder' => 'comment'])}}
    </div>

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
    @endforeach
@endif

@endsection