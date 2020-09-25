@extends('theme')

@section('content')
    <section class="bg-light pt-5 pb-4">
        <div class="container">

            <x-titulo>Nuestras Sucursales</x-titulo>

            <div class="container">

                @include('templates.sucursales.mapa')

                <div class="row">
                    @foreach ($sucursales as $sucursal)
                        <div class="col-sm-6 mb-4">
                            @include('templates.sucursales.sucursal', ['sucursal' => $sucursal])
                        </div>
                    @endforeach
                </div>
                
            </div>

        </div>
    </section>
@endsection