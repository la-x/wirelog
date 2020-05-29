@extends('layouts.app')

@section('content')
    <h3>USERS</h3><small>users>index.blade.php</small>
        @if(count($user) > 0)
        @foreach($user as $user)
        <div class="card card-body mb-1 text-center">
            <h5>
                @if(Auth::user()->email == 'l.albert@wirelog.com.au')
                <a href="/user/{{$user->id}}">
                @endif
                <div class="text-warning">{{$user->id}}</div>
                </a>
                <div class="text-info">{{$user->email}}</div>
                <small class="text-success">created </small><small class="text-info">{{$user->created_at}}</small>
            </h5>
        </div>
        @endforeach

    @else
        <p>No posts found</p>
    @endif
@endsection