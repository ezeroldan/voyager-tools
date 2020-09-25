@extends('layouts.app')

@section('theme')
    <header class="py-3 d-none d-md-block border-bottom d-print-none">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-md-4">
                    <a href="{{ route('home') }}" class="d-inline-block" title="{{ config('app.name') }}">
                        <img class="img-fluid" src="{{ asset(theme_url('logo.png')) }}" alt="{{ config('app.name') }}"/>
                    </a>
                </div>
            </div>
        </div>
    </header>

    <nav class="navbar border-bottom sticky-top navbar-light navbar-expand-md">
        <div class="container">
            <a class="navbar-brand d-md-none" href="{{ route('home') }}">{{ config('app.name') }}</a>

            <b-navbar-toggle target="botonera"></b-navbar-toggle>

            <b-collapse id="botonera" is-nav>
                <ul class="navbar-nav">
                    {{ menu('header') }}
                </ul>
            </b-collapse>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    @if (setting('site.whatsapp'))
        <btn-whatsapp 
            numero="{{ setting('site.whatsapp') }}"
            mensaje="@yield('whatsapp', 'Quiero que me contacten.')"
            :bottom="@yield('whatsapp_bottom', 10)">
        </btn-whatsapp>
    @endif

    <footer class="d-print-none">

        <div class="bg-dark pt-5 pb-4">
            <div class="container">

                <div class="row align-items-center justify-content-between">
                    <div class="col">
                        <address>
                            <h5 class="text-white">{{ config('app.name') }}</h5>
                        </address>
                    </div>
                    
                    <div class="text-right col-md-4 d-none d-md-block">
                        <a href="{{ route('home') }}" class="d-inline-block" title="{{ config('app.name') }}">
                            <img class="img-fluid" src="{{ asset(theme_url('logo_footer.png')) }}" alt="{{ config('app.name') }}"/>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-black text-white py-2">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col py-2">
                        {{ menu('footer', 'components.list') }}
                    </div>
                    <div class="col-12 col-sm-3 text-center text-sm-right py-2">
                        <a href="" target="_blank" class="">
                            Dise&ntilde;o y Desarrollo: 
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
    </footer>
@endsection