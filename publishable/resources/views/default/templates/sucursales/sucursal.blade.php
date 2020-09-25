<div class="card shadow-sm">
    <div class="card-body text-center py-4">
        <h5 class="card-title">{{ $sucursal->nombre }}</h5>

        @if ($sucursal->direccion)
            <h6 class="card-subtitle mb-2 text-muted">
                <i class="mdi mdi-map-marker"></i>
                {{ $sucursal->direccion }}
            </h6>
        @endif

        @if ($sucursal->email)
            <a href="mailto:{{ $sucursal->email }}" class="card-link">
                <i class="mdi mdi-email-edit-outline"></i>
                {{ $sucursal->email }}
            </a>
        @endif

        @if ($sucursal->telefono)
            <a href="tel:{{ $sucursal->telefono }}" class="card-link">
                <i class="mdi mdi-phone"></i>
                {{ $sucursal->telefono }}
            </a>
        @endif

    </div>
</div>