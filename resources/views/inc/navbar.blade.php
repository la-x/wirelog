{{-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">{{config('app.name', 'wl')}}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="nav navbar-nav navbar-right">
        
      </ul>
    </div>
</nav> --}}

<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>
  
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
  
                </ul>
  
                <ul class="navbar-nav mr-auto">
                  {{-- <li class="nav-item"><a class="nav-link" href="/">HOME</a></li> --}}
                  @if(!Auth::guest())
                        <li class="nav-item"><a class="nav-link" href="/job">JOBS</a></li>
                        <li class="nav-item"><a class="nav-link" href="/user">USERS</a></li>
                        <li class="nav-item"><a class="nav-link" href="/technician">TECHNICIANS</a></li>
                        @if(Auth::user()->email == 'l.albert@wirelog.com.au')
                        <li class="nav-item"><a class="nav-link" href="/job_log">ACTIVITY</a></li>
                        @endif
                        {{-- <li class="nav-item"><a class="nav-link" href="/job_log/create">ADD COMMENT</a></li> --}}
                      {{-- @if(Auth::user()->email == 'l.albert@wirelog.com.au')
                        <li class="nav-item"><a class="nav-link" href="/job/create">ADD JOBS</a></li>
                        <li class="nav-item"><a class="nav-link" href="/technician/create">ADD TECHNICIANS</a></li>
                      @endif --}}
                  @endif
                </ul>
  
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->email }} <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                              {{-- <a class="dropdown-item" href="/home">HOME</a> --}}
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
  
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>