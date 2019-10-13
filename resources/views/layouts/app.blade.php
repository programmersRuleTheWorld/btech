<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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
         @include('...include.navbar')
            <div class="p-1 mt-1 bg-info ">
                <main class="py-4">
                    @yield('content')
                        <div class="row m-auto">
                            <footer class="m-auto">
                                <div class="col">    
                                    <a href="{{ route('privacy') }}" class="nav-link text-center col-4 m-auto">
                                        {{ __('Privacy Policy') }}
                                    </a>
                                    <b>&copy;Copyright 2019 Bertram Technologies All Rights Reserved</b>
                                </div>
                            </footer>
                        </div>
                </main>
            </div>
    </div>
    </div>
</body>
</html>
