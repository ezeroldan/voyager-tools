@extends('theme')

@section('content')
    <section class="bg-light pt-5 pb-4">
        <div class="container">

            <h2>{{ $pagina->nombre }}</h2>

            @if ($pagina->foto)
                <b-img-lazy src="{{ asset(Storage::url($pagina->foto)) }}" thumbnail fluid class="mb-3"></b-img-lazy>
            @endif

            <div>{!! $pagina->body !!}</div>

        </div>
    </section>
@endsection