<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>

        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Heebo:300,400,700|Kanit:100,200,300,400,500,600,700">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/00_dashboard.css') }}">
        @yield('CustomCss')
    </head>
    <body class="@yield('BodyClass')">
        <div class="uk-offcanvas-content">
            @include('00_layouts.02_system.01_header')

            @yield('Content')

            @include('00_layouts.02_system.02_footer')
        </div>

        <!-- Scripts -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="{{ asset('vendor/jquery-mask/dist/jquery.mask.min.js') }}"></script>
        <script src="{{ asset('js/uikit.min.js') }}"></script>
        <script src="{{ asset('js/uikit-icons.min.js') }}"></script>
        <script src="{{ asset('js/load.js') }}"></script>
        @yield('CustomJs')
    </body>
</html>