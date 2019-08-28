<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
               <div class="container-fluid">   
    <div id="app">
        @include('include/messages')
        <nav class="navbar navbar-expand-md navbar-light mt-3 bg-warning">
            <div class="container">
                <a class="navbar-brand p-0" href="{{ url('/') }}" >
                    {{ config('app.name', 'Laravel') }}
                </a>
                                <img src={{ url("images/logos/btlogogrey_bd.png") }} width="8%">

                <button class="navbar-toggler bg-warning" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
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
                                <a class="nav-link text-center" href="{{ route('blog') }}">
                                    {{ __('Blog') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-center" href="{{ route('contact') }}">
                                    {{ __('Contact') }}
                                </a>
                            </li>
                        
                        @guest 
                                <!-- Authentication Links -->

                            <!--<li class="nav-item">
                                <a class="nav-link text-center" href="{{ route('login') }}">
                                    {{ __('Login') }}
                                </a>
                            </li>!-->
                        
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-center" href="{{ route('register') }}">{{ __('Register') }}
                                    </a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown text-center">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    
                                    
                                    <a class="dropdown-item text-center" href="{{ route('dashboard') }}">
                                        {{ __('My Profile') }}
                                    </a>

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
            </div>
        </nav>
            <div class="jumbotron mt-3 bg-warning">
                <main class="py-4">
                    @yield('content')
                </main>
            </div>
    </div>
    </div>
</body>
</html>
