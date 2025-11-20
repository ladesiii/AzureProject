@extends('plantillas.landing')

@section('content')
    @guest
        @if(request()->get('unauthorized') === 'proyecto')
            <!-- Modal de alerta -->
            <div class="modal fade show" id="alertModal" tabindex="-1" aria-labelledby="alertModalLabel" aria-modal="true" role="dialog" style="display: block; background-color: rgba(0,0,0,0.5);">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-warning text-dark">
                            <h5 class="modal-title fw-bold" id="alertModalLabel">
                                <i class="bi bi-exclamation-triangle-fill me-2"></i>¡Atención!
                            </h5>
                            <button type="button" class="btn-close" onclick="window.location.href='{{ route('landing') }}'" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p class="mb-0">Para crear un proyecto necesitas tener una cuenta creada y sesión iniciada.</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endguest
    <div class="container-fluid px-4 px-md-5 py-3">
        <div class="row justify-content-center align-items-center g-4">
            <div class="col-12 col-lg-5">
                <h1 class="mb-5">
                    Un espacio pensado para que estudiantes como tú transformen ideas
                    en grandes logros.
                </h1>
                <div class="d-flex flex-column gap-4">
                    <h4>
                        <span class="color-letra">Crea proyectos únicos:</span> desde investigaciones hasta emprendimientos, todo comienza con una idea.
                    </h4>
                    <h4>
                       <span class="color-letra">Comparte y colabora:</span> construir, aprender y crecer juntos.
                    </h4>
                    <h4>
                        <span class="color-letra">Organiza tu trabajo:</span> todo en un mismo lugar, accesible siempre que lo necesites.
                    </h4>
                </div>
                <div class="mt-5">
                    @auth
                        <a href="{{ route('proyecto') }}?openModal=true" class="btn-auth text-decoration-none d-inline-block text-center">CREAR PROYECTO</a>
                    @else
                        <a href="{{ route('landing') }}?unauthorized=proyecto" class="btn-auth text-decoration-none d-inline-block text-center">CREAR PROYECTO</a>
                    @endauth
                </div>
            </div>
            <div class="col-12 col-lg-6 text-center">
                <img src="{{ asset('img/landing.png') }}" alt="Logo" class="img-fluid img-landing">
            </div>
        </div>
    </div>
@endsection

