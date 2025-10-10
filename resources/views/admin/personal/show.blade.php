@extends('adminlte::page')

@section('title', 'Detalles del Personal')

@section('content_header')
    <h1><b>Detalles del Personal {{ $personal->tipo }}</b></h1>
    <hr class="border-top border-3 border-primary rounded">
@stop

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-header bg-gradient-primary text-white rounded-top-4">
                <h4 class="mb-0 card-title"><i class="fas fa-id-card"></i> Información del Personal</h4>
            </div>
            <div class="card-body p-4">
                <div class="row">
                    {{-- Fotografía --}}
                    <div class="col-md-3 text-center">
                        <h5 class="fw-semibold text-primary"><i class="fas fa-camera"></i> Fotografía</h5>
                        <img src="{{ url($personal->foto) }}" alt="Foto del personal" width="150" class="rounded-circle shadow-sm mb-3">
                        <p class="text-muted mb-0">{{ $personal->nombre }} {{ $personal->apellido }}</p>
                        <p><span class="badge bg-primary">{{ strtoupper($personal->tipo) }}</span></p>
                    </div>

                    {{-- Datos Personales --}}
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="fw-semibold text-muted"><i class="fas fa-user text-primary"></i> Nombre</label>
                                <div class="form-control bg-light border-0 rounded-pill">{{ $personal->nombre }}</div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="fw-semibold text-muted"><i class="fas fa-user-edit text-primary"></i> Apellido</label>
                                <div class="form-control bg-light border-0 rounded-pill">{{ $personal->apellido }}</div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="fw-semibold text-muted"><i class="fas fa-id-badge text-primary"></i> Cédula</label>
                                <div class="form-control bg-light border-0 rounded-pill">{{ $personal->ci }}</div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="fw-semibold text-muted"><i class="fas fa-birthday-cake text-primary"></i> Fecha de Nacimiento</label>
                                <div class="form-control bg-light border-0 rounded-pill">{{ \Carbon\Carbon::parse($personal->fecha_nacimiento)->format('d/m/Y') }}</div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="fw-semibold text-muted"><i class="fas fa-phone-alt text-primary"></i> Teléfono</label>
                                <div class="form-control bg-light border-0 rounded-pill">{{ $personal->telefono }}</div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="fw-semibold text-muted"><i class="fas fa-briefcase text-primary"></i> Profesión</label>
                                <div class="form-control bg-light border-0 rounded-pill">{{ $personal->profesion }}</div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="fw-semibold text-muted"><i class="fas fa-envelope text-primary"></i> Correo Electrónico</label>
                                <div class="form-control bg-light border-0 rounded-pill">{{ $personal->usuario->email }}</div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="fw-semibold text-muted"><i class="fas fa-users-cog text-primary"></i> Rol</label>
                                <div class="form-control bg-light border-0 rounded-pill">
                                    {{ $personal->usuario->roles->pluck('name')->implode(', ') }}
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="fw-semibold text-muted"><i class="fas fa-map-marker-alt text-primary"></i> Dirección</label>
                            <div class="form-control bg-light border-0 rounded-pill">{{ $personal->direccion }}</div>
                        </div>

                        <div class="text-center mt-4">
                            <a href="{{ route('admin.personal.index', $personal->tipo) }}" class="btn btn-outline-secondary rounded-pill">
                                <i class="fas fa-arrow-left"></i> Volver
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('footer')
    <div class="text-center py-3">
        <strong>&copy; 2025 <a href="#">Juan Carlos</a>.</strong> Todos los derechos reservados.
    </div>
@stop

