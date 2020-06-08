@extends('layouts.app')

@section('content')
<small>users>index.blade.php</small>
@if(Auth::user()->email !== env("ADMIN"))
<div class="alert alert-warning">
    <strong>Sorry!</strong> You are unauthorised to view users.
</div>  
@else
    <h3>USERS</h3>
        @if(count($user) > 0)
        @foreach($user as $user)
        <div class="card card-body mb-1 text-center">
            <h5>
                {{-- @if(Auth::user()->email == 'l.albert@wirelog.com.au') --}}
                @if(Auth::user()->email == env("ADMIN"))
                <a href="/user/{{$user->id}}">
                @endif
                <div class="text-warning">{{$user->id}}</div>
                </a>
                <div><i class="fas fa-envelope text-info"></i> <span class="text-default">{{$user->email}}</span></div>
                <h6><span class="text-success"><i class="far fa-clock"></i></span> <span class="text-secondary">{{$user->created_at}}</span><h6>
            </h5>
        </div>
        @endforeach
    @else
        <p>No posts found</p>
    @endif
@endif
@endsection