<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {!! SEO::generate(App::isProduction()) !!}

        <link rel="icon" href="{{ asset(theme_url('favicon.ico')) }}" type="image/x-icon"/> 
        
        <link rel="stylesheet" href="https://cdn.materialdesignicons.com/5.1.45/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="{{ asset(theme_url('theme.css')) }}">
        @stack('css')

        @yield('recaptcha')
        
        @laravelPWA

    </head>
    <body>
        
        <div id="app">
            @yield('theme')
        </div>
        
        <script src="{{ asset(mix('js/app.js')) }}"></script>

        @if (setting('site.google_analytics_tracking_id'))
            <script async src="https://www.googletagmanager.com/gtag/js?id={{ setting('site.google_analytics_tracking_id') }}"></script>
            <script>
                window.dataLayer = window.dataLayer || [];
                function gtag(){dataLayer.push(arguments);}
                gtag('js', new Date());
                gtag('config', "{{ setting('site.google_analytics_tracking_id') }}");
            </script>
        @endif

        @stack('js')

    </body>
</html>
