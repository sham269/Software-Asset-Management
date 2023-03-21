
      <nav class="navbar navbar-dark navbar-expand-md shadow-sm text-white">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{-- {{ config('app.name', 'Laravel') }} --}}
                <img src="\build/assets/logo.jpg" class="img-fluid" width="100px" height="100px">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                {{-- <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">

                </ul> --}}
                @if(Auth::user())
                    <ul class="navbar-nav mr-auto">
                        <li>
                          <a class="nav-link" href="/">Home</a>
                        </li>
                          <li class="nav-item">
                            <a class="nav-link" href="/posts/index">Software Available</a>
                          </li>
                          @if(Auth::user() && Auth::user()->role=="Academic")
                          <li class="nav-item">
                            <a class="nav-link" href="/request">Software Request</a>
                          </li>
                          @endif
                       
                      </ul>


                @endif



                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name}} ({{Auth::user()->role}})

                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                             @if(Auth::user()->is_admin==1 || Auth::user()->role=="System Admin")


                                    <a class="dropdown-item" href="/admin">Admin Console</a>



                            @endif
                            @if(Auth::user() && Auth::user()->role=="Academic")


                                    <a class="dropdown-item" href="/my_requests">My Requests</a>
                                    <a class="dropdown-item" href="/my_profile">My Profile</a>
                                      <a class="dropdown-item" href="https://www.aston.ac.uk/ict" target="_blank">Contact Us</a>
                          



                            @endif
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>



                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
