<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app() -> getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        {{-- Seo Tags  --}}
        <title>@yield('title') - Equi-par</title>
        <meta name="description" content="@yield('descripcion')">
        <meta name="author" content="Equi-par">
        {{-- Open Graphs  --}}
        <meta property="og:url" content="{{ url() -> current() }}">
        <meta property="type" content="website">
        <meta property="og:site_name" content="Equi-par">
        <meta property="og:title" content="@yield('title')">
        <meta property="og:description" content="@yield('descripcion')">
        <meta property="og:image" content="@yield('imagen')">
        {{-- Favicons  --}}
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('images/ico/apple-touch-icon-144-precomposed.png') }}">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('images/ico/apple-touch-icon-114-precomposed.png') }}">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('images/ico/apple-touch-icon-72-precomposed.png') }}">
        <link rel="apple-touch-icon-precomposed" href="{{ asset('images/ico/apple-touch-icon-57-precomposed.png') }}">
        <link rel="shortcut icon" href="{{ asset('images/ico/favicon.png') }}">
        {{-- Polyfill --}}
        <script src="{{ asset('js/observer.js') }}"></script>
        <script>IntersectionObserver.prototype.POLL_INTERVAL = 100;</script>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600&display=swap">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/instantsearch.css@7.3.1/themes/reset-min.css" integrity="sha256-t2ATOGCtAIZNnzER679jwcFcKYfLlw01gli6F6oszk8=" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/instantsearch.css@7.4.5/themes/satellite-min.css" integrity="sha256-TehzF/2QvNKhGQrrNpoOb2Ck4iGZ1J/DI4pkd2oUsBc=" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('v2/css/app.css') }}">
        @stack('customCss')
    </head>
    <body>
        @include('frontend_v2.master.header')

        @include('frontend_v2.master.search')

        @yield('content')

        @include('frontend_v2.master.footer')

        <!-- Scripts -->
        @if( env('APP_ENV') != 'local' )
            @include('frontend_v2.master.gtag')
        @endif

        <script src="{{ asset('v2/js/app.js') }}"></script>
        <script src="{{ asset('v2/js/quotator.js') }}"></script>
        @stack('customJs')

        <script src="https://polyfill.io/v3/polyfill.min.js?features=default%2CArray.prototype.find%2CArray.prototype.includes%2CPromise%2CObject.assign%2CObject.entries"></script>
        <script src="{{ asset('v2/js/algolia.js') }}"></script>

        <link rel="stylesheet" href="{{ asset('v2/css/swal2.css') }}">
    </body>
</html>