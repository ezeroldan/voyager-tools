@extends('app')

@section('css')
    @parent
@endsection

@section('js')
    @parent
@endsection

@section('theme')

    <header></header>

    @yield('content')

    <footer></footer>

@endsection