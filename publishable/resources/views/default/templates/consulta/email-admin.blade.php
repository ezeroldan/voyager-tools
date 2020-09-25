@component('mail::message')
# Nueva Consulta Ingresada

**{{ $consulta->nombre }} {{ $consulta->apellido }}** ha realizado una consulta.

Sus email de contacto es **[{{ $consulta->email }}](mailto:{{ $consulta->email }})** y su tel&eacute;fono: **{{ $consulta->telefono }}**.

## Su Consulta:
{{ $consulta->mensaje }}

@slot('subcopy')
Fecha de consulta: {{ $consulta->created_at->format('d/m/Y - H:i') }}
@endslot

@endcomponent
