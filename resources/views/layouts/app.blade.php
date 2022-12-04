<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <meta name="description" content="@yield('meta_description')">
    <meta name="keywords" content="@yield('meta_keyword')">
    <meta name="author" content="My Ecom Web Id">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <!----------------link------------------->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <!---------------Owl Carsoual-link------------------->
    <link href="{{asset('assets/css/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/owl.theme.default.min.css')}}" rel="stylesheet">
    <!---------------Exzoom Products Image------------------->
    <link href="{{asset('assets/exzoom/jquery.exzoom.css')}}" rel="stylesheet">
    @livewireStyles
</head>
<body>
    <div id="app">
        @include('layouts.inc.frontend.nabar')
        <main>
            @yield('content')
        </main>
        @include('layouts.inc.frontend.footer')
    </div>

    <!----------Script-------------->
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery-3.6.1.min.js')}}"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <!----------Exzoom Product Image-------------->
    <script src="{{asset('assets/exzoom/jquery.exzoom.js')}}"></script>

    <!----------Owl Carsoual  Script-------------->
    <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
    @yield('script')

    <script>
        window.addEventListener('message', event => {
        if(event.detail){
            alertify.set('notifier','position', 'top-right');
            alertify.notify(event.detail.text, event.detail.type);
        }
    });
    </script>
    @livewireScripts
    @stack('scripts')
</body>
</html>
