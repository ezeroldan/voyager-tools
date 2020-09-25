@extends('theme')

@section('recaptcha')
<!-- reCaptcha -->
<script type="text/javascript" src="https://www.google.com/recaptcha/api.js?render={{ config('app.recaptcha_site_key') }}"></script>
<script type="text/javascript">
    grecaptcha.ready(function() {
        grecaptcha.execute("{{ config('app.recaptcha_site_key') }}", {action: "homepage"}).then(function(token) {
            document.getElementById("g-recaptcha-response").value = token;
        });
    });
</script>
@endsection

@section('whatsapp_bottom', 90)

@section('content')
    <section class="consulta bg-light pt-5 pb-4">
        <div class="container">
            <h1 class="display-3">Contacto</h1>
            <div class="row align-items-center">

                <div class="col my-3">

                    @error('g-recaptcha-response')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                    
                    <form action="{{ route('consulta.store') }}" method="POST" class="card shadow">
                        @csrf
                        <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response" value="" />

                        <div class="card-body">
            
                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="nombre">Nombre:</label>
                                        <input type="text" class="form-control @error('nombre') is-invalid @enderror " id="nombre" name="nombre" required autocomplete="off" value="{{ old('nombre') }}">
                                        @error('nombre') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="apellido">Apellido:</label>
                                        <input type="text" class="form-control @error('apellido') is-invalid @enderror " id="apellido" name="apellido" required autocomplete="off" value="{{ old('apellido') }}">
                                        @error('apellido') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror " id="email" name="email" required autocomplete="off" value="{{ old('email') }}">
                                        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="telefono">Tel&eacute;fono:</label>
                                        <input type="text" class="form-control @error('telefono') is-invalid @enderror " id="telefono" name="telefono" required autocomplete="off" value="{{ old('telefono') }}">
                                        @error('telefono') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                            </div>
            
                            <div class="form-group mb-0">
                                <label for="mensaje">Mensaje:</label>
                                <textarea class="form-control @error('mensaje') is-invalid @enderror " id="mensaje" name="mensaje" rows="5" >{{ old('mensaje') }}</textarea>
                                @error('mensaje') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <div class="card-footer">
                            <div class="row justify-content-center">
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        Enviar Consulta
                                        <i class="mdi mdi-email-send"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-sm-4 my-3">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <dl>

                                <dt><i class="mdi mdi-phone text-muted"></i> Tel&eacute;fono</dt>
                                <dd class="pl-3">{{ setting('site.telefono') }}</dd>
                                    
                                <dt><i class="mdi mdi-email-open text-muted"></i> Correo Electr&oacute;nico</dt>
                                <dd class="pl-3"><a href="mailto:{{ setting('site.email') }}">{{ setting('site.email') }}</a></dd>

                                <dt><i class="mdi mdi-map-marker text-muted"></i> Direcci&oacute;n</dt>
                                <dd class="pl-3">{{ setting('site.direccion') }}</dd>

                            </dl>

                            <h5 class="text-muted mt-4 mb-2 text-center">Podes comunicarte a trav&eacute;s de</h5>
                            <div class="text-center">
                                {{ menu('redes', 'components.redes') }}
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>

    <section class="bg-white pt-4 pb-4">
        <div class="container">
            <h2 class="display-4 text-center mb-4">Nuestras Sucursales</h2>
            @include('templates.sucursales.mapa', ['height' => 450])
        </div>
    </section>
    
    <section class="bg-secondary pt-4 pb-4">
        <div class="container">
            @include('templates.sucursales.carousel')
        </div>
    </section>

@endsection