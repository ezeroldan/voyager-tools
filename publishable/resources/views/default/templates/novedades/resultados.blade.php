@extends('theme')

@section('content')
    <section class="bg-light pt-5 pb-4">
        <div class="container">

            <h1 class="display-3">@yield('titulo', 'Últimas Novedades')</h1>

            <form method="GET" class="card mb-4 shadow-sm">
                <div class="card-body">
                    <b-input-group prepend="Filtrar por Nombre">
                        <b-form-input name="nombre" value="{{ request()->query('nombre') }}"></b-form-input>
        
                        <b-input-group-append>
                            <b-button variant="outline-danger" href="{{ route('novedades') }}"><i class="mdi mdi-close"></i></b-button>
                            <b-btn type="submit">Filtrar</b-btn>
                        </b-input-group-append>
        
                    </b-input-group>
                </div>
            </form>

            <div class="row align-items-stretch">
                @each('templates.novedades.resultado', $novedades, 'novedad', 'templates.novedades.sin_resultados')
            </div>

            <hr>

            <div class="row align-items-center justify-content-around">
                <div class="col-md-6 my-2">
                    <div class="small text-muted text-center text-md-left">
                        <b>{{ $novedades->total() }}</b> Novedades encontradas - <b>{{ $novedades->count() }}</b> En la pagina actual
                    </div>
                </div>
                <div class="col-md-6 my-2">{{ $novedades->links() }}</div>
            </div>
           
        </div>
    </section>
@endsection