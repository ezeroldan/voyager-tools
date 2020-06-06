<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {!! SEO::generate(App::isProduction()) !!}

        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        @stack('css')
        
    </head>
    <body>
        
        <div id="app" v-cloak>
            @yield('theme')
        </div>

        <script src="{{ mix('js/app.js') }}"></script>
        @stack('js')

    </body>
</html>
