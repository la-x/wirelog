@extends('layouts.app')

@section('content')
{{-- pages>index.blade.php
<div class="jumbotron text-center">
    <div class="jumbotron text-center">
        <h1>{{$title1}} {{$title2}}</h1>
        <p>HIIIII</p>
        <p><a class="btn btn-dark btn-lg" href="/login" role="button">Login</a> <a class="btn btn-dark btn-lg" href="/register" role="button">Register</a></p>
    </div>
</div> --}}
<div class="container">
    <div class="mx-5 my-5 text-center">
      <div id="logos">
        <img src="/storage/cover_images/homelogo.png" alt="">
      </div>
    </div>
    <div class="mt-4 text-center">
      <h6>welcome</h6>
      <i class="fas fa-tools"></i>
    </div>
  </div>

  <a href="mailto:info@wirelog.com.au" target="_top">
    <div class="mb-4 fixed-bottom text-center text-dark">
      <h6>info@wirelog.com.au</h6>
      <h6><small>© 2020 LUKE ALBERT</small></h6>
    </div>
  </a>
    
</body>
</html>
@endsection