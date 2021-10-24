<nav class="navbar navbar-expand-md navbar-light mt-2 mb-2 bg-info">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ url('/') }}">
        <b><small>Bertram Technologies</small></b>
    </a>
    <img src="{{ asset('images/btlogoMinified.gif') }}" id="btlogo">

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    </div>
    <div class="collapse navbar-collapse col-4" id="navbarSupportedContent">
      <ul class="navbar-nav mb-2">

      <li class="nav-item">
                <a class="nav-link text-center" href="{{ route('index') }}">
                    {{ __('Home') }}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-center" href="{{ route('about') }}">
                    {{ __('About') }}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-center" href="{{ route('company_services') }}">
                    {{ __('Company Services') }}
                </a>
            </li>
        
            </li>
            <li class="nav-item">
                <a class="nav-link text-center" href="{{ route('contact') }}">
                    {{ __('Contact') }}
                </a>
            </li>

      <li class="nav-item dropdown">
        @guest 
                <!-- Authentication Links -->

            <li class="nav-item">
                <a class="nav-link text-center" href="{{ route('login') }}">
                    {{ __('Login') }}
                </a>
            </li>
        
            @if(Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link text-center" href="{{ route('register') }}">{{ __('Register') }}
                    </a>
                </li>
            @endif
        @else
            <li class="nav-item dropdown">
            <div class="btn btn-info nav-link dropdown-toggle m-auto" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">                    
                {{ Auth::user()->first_name . ' ' . Auth::user()->last_name }} <span class="caret"></span>
            </div>
                
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    
                    
                    <a class="dropdown-item text-center" href="{{ route('dashboard') }}">
                        {{ __('Dashboard') }}
                    </a>
                    @if(Auth::user()->isAdmin() === true)
                    <a class="dropdown-item text-center" href="{{ route('admin') }}">
                        {{ __('Admin Panel') }}
                    </a>
                    @endif

                    <a class="dropdown-item text-center" href="{{ route('users.show', [Auth::user()->id]) }}">
                        {{ __('My Profile') }}
                    </a>
<!--
                    <a class="dropdown-item text-center" href=" route('affiliate_details' ) ">
                        {{ __('Affiliate Details') }}
                    </a>
!-->

                    <a class="dropdown-item text-center" href="{{ route('logout') }}"
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
</nav>