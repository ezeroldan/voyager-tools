@extends('theme')

@section('content')
    <section class="bg-light pt-5 pb-4">
        <div class="container">
            <x-titulo>Gracias por su Consulta</x-titulo>
            <div class="alert alert-success lead p-4">{{ $mensaje }}</div>
        </div>
    </section>
@endsection