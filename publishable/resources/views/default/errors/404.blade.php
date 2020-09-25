@extends('theme')

@section('content')
    <section class="bg-white pt-5 pb-4">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-md-8">
                    <h3 class="display-3 mb-4">P&aacute;gina no encontrada</h3>
                    <p class="mb-1">No fue posible encontrar lo que buscabas, pero pod&eacute;s volver a la Home y continuar buscando.</p>
                    <a href="{{ route('home') }}" class="btn btn-primary">Volver a la Home</a>
                </div>

                <div class="col-md-4 text-center">
                    <div class="mdi mdi-home-remove-outline text-muted" style="font-size: 200px; line-height: 200px;"></div>
                </div>


            </div>
        </div>
    </section>
@endsection