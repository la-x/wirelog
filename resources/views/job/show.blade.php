@extends('layouts.app')

@section('content')
<small>job>show.blade.php</small>
    <a href="/job" class="btn btn-outline-dark float-right">BACK</a>
    <h3>JOB</h3>
    
    <div class="card-body mb-1 text-center">
        <h5>
            <div class="row">
                <div class="col-md-12">
                    <a href="/storage/cover_images/{{$job->cover_image}}">
                        <img style="width:100px" src="/storage/cover_images/{{$job->cover_image}}" alt="">
                    </a>
                </div>
                <div class="col-md-12">
                    {{-- <small class="text-danger">SELECTED</small> --}}
                    {{-- <a href="/job/{{$job->jobID}}"> --}}
                        <div class ="text-warning">{{$job->jobID}}</div>
                    {{-- </a> --}}
                    <i class="fas fa-wrench text-secondary"></i>
                    <div class="text-default">{{$job->contractor}}<div>
                    <div class="text-info">{{$job->location}}</div>
                    <small class="text-success"><i class="far fa-clock"></i></small> <small class="text-secondary">{{$job->created_at}}</small>
                </div>
            </div>
        </h5>
    </div>

    <hr>

    @if(Auth::user()->email == env("ADMIN") OR $access == 'ICA')
    <a href="/job/{{$job->jobID}}/edit" class="btn btn-outline-dark">EDIT</a>
    {!!Form::open(['action' => ['JobsController@destroy', $job->jobID], 'method' => 'POST', 'class' => 'float-right'])!!}
        @if(Auth::user()->email == env("ADMIN"))
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class' => 'btn btn-outline-danger'])}}
        @endif
    {!!Form::close()!!}
    <hr>
    @endif

    {{-- <hr>
    <h3 class="text-center">COMMENTS</h3>
    <hr> --}}

    @foreach ($te as $te)
    <div class="card card-body mb-1 text-center">
        <h5>
            <i class="fas fa-edit text-info"></i> <span>{{$te->comment}}</span>
            @if(count($b) == 0)
            <div class="alert alert-warning">
                <strong>Sorry!</strong> You need to be a tech before you can see these details.
            </div>                                      
            @else
            <h6><span class="text-success"><i class="far fa-clock"></i></span> <span class="text-secondary">{{$te->c_at}}</span><h6>
            <h6><i class="fas fa-user text-primary"></i> {{$te->name}} {{$te->surname}} <span class="text-warning">{{$te->position}}</span></h6> 
            <h6><i class="fas fa-phone text-primary"></i> {{$te->phone}}</h6>
            <h6><i class="fas fa-envelope text-info"></i> {{$te->email}}</h6>
            @endif
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
    {{Form::submit('Submit', ['class' => 'btn btn-outline-info mb-2 float-right'])}}
    {!! Form::close() !!}
    @endforeach
@endif

@endsection