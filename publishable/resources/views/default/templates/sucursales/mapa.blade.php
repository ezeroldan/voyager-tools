<sucursales-mapa 
    @if (isset($height)) :height="{{ $height }}" @endif

    :zoom="{{ config('voyager.googlemaps.zoom', 10) }}" 
    :center-lat="{{ config('voyager.googlemaps.center.lat', '-34.6037389') }}" 
    :center-lng="{{ config('voyager.googlemaps.center.lng', '-58.3815704') }}"

    :sucursales='@json(App\Web\Sucursal::all())'>
</sucursales-mapa>