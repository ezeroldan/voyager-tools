<div class="pb-4 col-sm-4">
    <div class="card shadow-sm h-100">
        <img src="{{ asset(Storage::url($novedad->fotos)) }}" class="card-img-top">
        <div class="card-body d-flex flex-column justify-content-between">
            <h4 class="card-title">{{ $novedad->nombre }}</h4>
           
            @if ($novedad->copete)
                <div class="card-text mb-2">{{ $novedad->copete }}</div>
            @endif

            <div class="row">
                <div class="col-sm-3">
                    <a href="{{ $novedad->url }}" target="_self" class="btn btn-primary btn-sm btn-block">
                        Ver M&aacute;s
                    </a>
                </div>
            </div>
            
        </div>
    </div>
</div>