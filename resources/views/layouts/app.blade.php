<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="images/logos/btlogobluetealgradient.svg" type="image/svg+xml">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Scripts -->
    <script src={{ asset('js/app.js') }} defer></script>
    <script src="https://www.google.com/recaptcha/api.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>Bertram Technologies</title>
</head>
<body>
               <div class="container-fluid">   
    <div id="app">
        @include('include.messages')
         @include('include.navbar')
            <div class="p-1 bg-info">
                <main class="py-4">
                    @yield('content')
                </main>
                @include('include/footer')
            </div>
    </div>
    </div>    
</body>
</html>
