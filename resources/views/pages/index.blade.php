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

<!-- Button trigger modal -->
<div class="text-center mt-5">
  <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#exampleModal">
    info
  </button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">help</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Following successful registration/login, users are able to navigate towards the collapsable hamburger menu if viewing via mobile devices.
          <hr>
          Reveal the navigation menu allowing users to navigate towards their desired destination.
          <hr>
          Should a user click on 'jobs' section, the job id number (yellow) will act as a href, allowing the user to proceed to view details relative to that specific job.
          <hr>
          Users are then able to click on the job photo (scan code) to obtain a full sized image should they require or wish to redistribute and/or print.
          <hr>
          If a user has administation credentials, they will similarly be able to click on technicians/users id numbers which will again act as a href to allow the user to edit or delete credtials.
          The implementation of bootstrap buttons has also been incorporated to enhance overall user interaction experience.
        </div>
        {{-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div> --}}
      </div>
    </div>
  </div>
</div>
    
</body>
</html>
@endsection