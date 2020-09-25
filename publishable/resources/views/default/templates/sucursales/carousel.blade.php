<div class="position-relative">
    <owl-carousel :margin="30" :stage-padding="5" :nav="false" autoplay :responsive="{ 0: { items:1 }, 576: { items: 2 } }">
            
        @foreach (App\Web\Sucursal::all() as $sucursal)
            <div class="py-3 h-100 w-100">
                @include('templates.sucursales.sucursal', ['sucursal' => $sucursal])
            </div>
        @endforeach
        
    </owl-carousel>
</div>

