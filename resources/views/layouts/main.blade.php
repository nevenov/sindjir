<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link type="image/x-icon" rel="shortcut icon" href="{{ asset('favicon.ico') }}" />

    <!--Meta Info-->
    @yield('meta')

    <!--Static StyleSheets-->
    <link rel="stylesheet" type="text/css" href="{{ elixir('css/main.css') }}" />

    <!--Dynamic StyleSheets-->
    @yield('styles')

    <!--Scripts-->
    <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/picturefill.min.js') }}"></script>

    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-72922726-1', 'auto');
        ga('send', 'pageview');

    </script>

</head>
<body>

    <!-- Language Bar -->
    <div id="lang_bar">
        @if(LaravelLocalization::getCurrentLocale() == 'bg')
            <a rel="alternate" hreflang="en" href="{{ LaravelLocalization::getLocalizedURL('en') }}">EN</a>
        @else
            <a rel="alternate" hreflang="bg" href="{{ LaravelLocalization::getLocalizedURL('bg') }}">BG</a>
        @endif
    </div>

    <!-- Logo -->
    <div id="logo">
        <a href="{{ url('/') }}">
            <img src="{{ asset('/images/logo.png') }}" alt="Лого" width="190" height="123">
        </a>
    </div>

    <!-- Banner -->
    <div class="banner">
        @yield('banner')
    </div>

    <!-- Navbar -->
    <nav class="navbar navbar-default">
        <div class="container">
            @include('partials.navigation')
        </div>
    </nav>

    <!-- Content -->
    @yield('content')

    @include('partials.footer')

    <!-- Scripts -->
    @yield('scripts')
</body>
</html>