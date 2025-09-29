@extends('adminlte::page')

@section('title', 'Configuración del Sistema')

@section('content_header')
    <h1>Datos del Sistema</h1>
    <hr class="border-top border-3 border-primary rounded">
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header bg-primary">
                    <h3 class="card-title"><i class="fas fa-cog"></i> Panel de Configuración del Sistema</h3>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.configuracion.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <!-- Logo de la I.E -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="logo" class="form-label fw-semibold">Logo de la I.E</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-image"></i>
                                            </span>
                                        </div>
                                        <input type="file" id="logo" name="logo" class="form-control"
                                            value="{{ old('logo', $configuracion->logo ?? '') }}"
                                            placeholder="Ingrese logo..." onchange="mostrarImagen(event)" accept="image/*">
                                        {{-- Previsualizar la imagen antes de guardarla --}}
                                        <div class="w-100 d-flex justify-content-center">
                                            <img class="img-fluid" id="preview"
                                                style="max-width: 300px; margin-top: 10px;"
                                                src="{{ url($configuracion->logo ?? '') }}">
                                        </div>
                                        @error('logo')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="row">
                                    <!-- Nombre -->
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="nombre" class="form-label fw-semibold">Nombre <b>(*)</b></label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-university"></i>
                                                    </span>
                                                </div>
                                                <input type="text" id="nombre" name="nombre"
                                                    class="form-control rounded-pill"
                                                    value="{{ old('nombre', $configuracion->nombre ?? '') }}"
                                                    placeholder="Ingrese el nombre..." required>
                                                @error('nombre')
                                                    <small style="color: red">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Descripcion -->
                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <label for="descripcion" class="form-label fw-semibold">Descripcion
                                                <b>(*)</b></label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-align-justify"></i>
                                                    </span>
                                                </div>
                                                <input type="text" id="descripcion" name="descripcion"
                                                    class="form-control rounded-pill"
                                                    value="{{ old('descripcion', $configuracion->descripcion ?? '') }}"
                                                    placeholder="Ingrese la descripcion..." required>
                                                @error('descripcion')
                                                    <small style="color: red">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <!-- Dirección -->
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="direccion" class="form-label fw-semibold">Dirección
                                                <b>(*)</b></label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-map-marker-alt"></i>
                                                    </span>
                                                </div>
                                                <input type="text" id="direccion" name="direccion"
                                                    class="form-control rounded-pill"
                                                    value="{{ old('direccion', $configuracion->direccion ?? '') }}"
                                                    placeholder="Ingrese la dirección..." required>
                                                @error('direccion')
                                                    <small style="color: red">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Teléfono -->
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="telefono" class="form-label fw-semibold">Teléfono <b>(*)</b></label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-mobile-alt"></i>
                                                    </span>
                                                </div>
                                                <input type="text" id="telefono" name="telefono"
                                                    class="form-control rounded-pill"
                                                    value="{{ old('telefono', $configuracion->telefono ?? '') }}"
                                                    placeholder="Ej: 698545874" required maxlength="9" pattern="\d{9}">
                                                @error('telefono')
                                                    <small style="color: red">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Divisa -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="divisa" class="form-label fw-semibold">Divisa <b>(*)</b></label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-money-bill-wave"></i>
                                                    </span>
                                                </div>
                                                <select name="divisa" id="divisa" class="form-control rounded-pill"
                                                    required>
                                                    <option value="">-- Seleccione una divisa --"></option>
                                                    @foreach ($divisas as $divisa)
                                                        <option value="{{ $divisa['symbol'] }}"
                                                            {{ old('divisa', $configuracion->divisa ?? '') == $divisa['symbol'] ? 'selected' : '' }}>
                                                            {{ $divisa['name'] . ' (' . $divisa['symbol'] . ')' }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('divisa')
                                                    <small style="color: red">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <!-- Correo Electrónico -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="correo_electronico" class="form-label fw-semibold">Correo
                                                Electrónico
                                                <b>(*)</b></label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-envelope"></i>
                                                    </span>
                                                </div>
                                                <input type="email" id="correo_electronico" name="correo_electronico"
                                                    class="form-control rounded-pill"
                                                    value="{{ old('correo_electronico', $configuracion->correo_electronico ?? '') }}"
                                                    placeholder="Ingrese el correo electrónico..." required>
                                                @error('correo_electronico')
                                                    <small style="color: red">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Sitio Web -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="web" class="form-label fw-semibold">Sitio Web
                                                <b>(*)</b></label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-globe"></i>
                                                    </span>
                                                </div>
                                                <input type="text" id="web" name="web"
                                                    class="form-control rounded-pill"
                                                    value="{{ old('web', $configuracion->web ?? '') }}"
                                                    placeholder="Ingrese el correo electrónico...">
                                                @error('web')
                                                    <small style="color: red">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    {{-- Botones --}}
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <a href="{{ route('admin.configuracion.index') }}" class="btn btn-default rounded-pill"><i
                                                    class="fas fa-arrow-left"></i> Cancelar</a>
                                            <button type="submit" class="btn btn-primary rounded-pill"><i class="fas fa-save"></i>
                                                Guardar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
@section('footer')
    <div class="text-center py-3">
        <strong>Copyright &copy; 2025 <a href="#">Juan Carlos</a>.</strong> Todos los derechos reservados.
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script>
        const mostrarImagen = e =>
            document.getElementById('preview').src = URL.createObjectURL(e.target.files[0]);
    </script>
@stop
