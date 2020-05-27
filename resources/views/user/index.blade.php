@extends('layouts.app')

@section('content')
    <h1>USERS</h1><small>users>index.blade.php</small>
        @if(count($user) > 0)
        @foreach($user as $user)
        <div class="card card-body mb-1 text-center">
            <h4>
                @if(Auth::user()->email == 'l.albert@wirelog.com.au')
                <a href="/user/{{$user->id}}">
                <div class="text-warning">{{$user->id}}</div>
                </a>
                @endif
                <div class="text-info">{{$user->email}}</div>
                <div class="text-primary">{{$user->created_at}}</div>
            </h4>
        </div>
        @endforeach

    @else
        <p>No posts found</p>
    @endif
@endsection