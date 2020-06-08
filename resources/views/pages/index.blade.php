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
      {{-- <i class="fas fa-tools"></i> --}}
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
    <i class="fas fa-info"></i>
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
          Navigate towards and click on the hamburger menu to register/login if viewing on mobile devices. Additionally, use this menu to navigate to any other tabs.
          <hr>
          Should a user click on the 'JOBS' section, the job id number (orange) will act as a href, allowing the user to proceed to view details/comments relative to that specific job.
          <hr>
          Within the 'JOBS' section, users are able to click on the job photo (scan code) to obtain a full sized image should they require or wish to redistribute and/or print.
          <hr>
          If a user has administation credentials, they will similarly be able to click on 'TECHNICIANS' and 'USERS' id numbers (orange) which will again act as a href to allow the user to edit or delete credtials.
          <hr>
          The implementation of bootstrap buttons has also been incorporated to enhance overall user interaction experience, resulting in full CRUD functionality.
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