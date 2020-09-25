@extends('theme')

@section('theme')
    <div class="row vh-100 no-gutters align-content-stretch">

        <div class="text-center col align-self-center">
            <p class="lead">You are currently not connected to any networks.</p>
        </div>
        
        <div class="col" style="background: url('{{ asset(theme_url('404.jpg')) }}') center center / cover no-repeat;"></div>

    </div>
@endsection