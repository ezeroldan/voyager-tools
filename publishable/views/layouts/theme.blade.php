@extends('layouts.app')

@push('css')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@300;400;500;600;700;800;900&display=swap">
@endpush

@section('theme')
    <header class="">
        <b-navbar toggleable="md" variant="light">

            <b-navbar-brand href="{{ route('home') }}">
                {{ config('app.name') }}
            </b-navbar-brand>

            <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

            <b-collapse id="nav-collapse" is-nav>
                <b-navbar-nav>
                    <b-nav-item href="{{ route('home') }}">Home</b-nav-item>
                </b-navbar-nav>
            </b-collapse>
        </b-navbar>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="bg-dark p-2 text-white text-center border-top small">
        Lorem ipsum dolor sit amet {{ now()->format('Y') }}
    </footer>
@endsection