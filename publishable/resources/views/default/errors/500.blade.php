@extends('theme')

@section('theme')
    <div class="row vh-100 no-gutters align-content-stretch">

        <div class="text-center col align-self-center">
            <h1 class="display-1 text-muted" style="font-size: 12rem;">500</h1>
            <p class="lead">Error interno del Servidor.</p>
        </div>
        
        <div class="col" style="background: url('{{ asset(theme_url('404.jpg')) }}') center center / cover no-repeat;"></div>
    
    </div>
@endsection