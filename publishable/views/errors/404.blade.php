@extends('layouts.theme')

@section('theme')
    <b-row no-gutters align-content="stretch" class="vh-100">

        <b-col class="text-center" align-self="center">
            <h1 class="display-1 text-muted" style="font-size: 12rem;">400</h1>
            <p class="lead">No se ha encontrado lo que busca.</p>
        </b-col>

        <b-col style="background: url('{{ asset('images/404.jpg') }}') no-repeat center; background-size: cover;">

        </b-col>
    </b-row>
@endsection