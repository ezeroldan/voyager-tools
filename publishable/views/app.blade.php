<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {!! SEO::generate(App::isProduction()) !!}

    <link href="{{ asset('favicon.ico') }}" type="image/x-icon" rel="shortcut icon">
    <link href="{{ asset('favicon.png') }}" type="image/png" rel="icon">

    @section('css')
        <link rel="stylesheet" href="{{ asset(mix('css/app.css')) }}">
    @show

</head>

<body>

    <div id="app" v-cloak>
        @yield('theme')
    </div>

    @section('js')
        <script src="{{ asset(mix('js/app.js')) }}"></script>
    @show

</body>

</html>