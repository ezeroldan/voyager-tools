@extends('theme')

@section('content')
    <section class="bg-light py-5">
        <div class="container">

            <h1 class="display-3">{{ $novedad->nombre }}</h1>

            <div class="mb-3">
                <a href="{{ route('novedades.categoria', ['categoria' => $novedad->categoria->slug]) }}">
                    {{ $novedad->categoria->nombre }}
                </a>
            </div>

            <blockquote class="blockquote">
                {{ $novedad->copete }}
            </blockquote>
            
            @if ($novedad->fotos)
                <b-img-lazy src="{{ asset(Storage::url($novedad->fotos)) }}" thumbnail fluid class="mb-3"></b-img-lazy>
            @endif

            <b-card no-body>
                <b-card-body class="p-4">
                    {!! $novedad->description !!}
                </b-card-body>
            </b-card>
           
        </div>
    </section>
@endsection