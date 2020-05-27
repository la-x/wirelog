@extends('layouts.app')

@section('content')
    <h1>TECHNICIANS</h1><small>technician>index.blade.php</small>
        @if(count($user) > 0)
        @foreach($user as $user)
        <div class="card card-body mb-1 text-center">
            <h4>
                @if(Auth::user()->email == 'l.albert@wirelog.com.au')
                <a href="/technician/{{$user->id}}">
                <small class="text-info">User ID {{$user->id}}</small>
                </a>
                @endif
                <small class="text-info">{{$user->email}}</small>
                <small class="text-info">{{$user->created_at}}</small>
            </h4>
        </div>
        @endforeach

    @else
        <p>No posts found</p>
    @endif
@endsection