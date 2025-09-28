@extends('adminlte::page')

@section('content_header')
    <h1><b>Registro de un Nuevo Turno</b></h1>
    <hr class="border-top border-3 border-primary rounded">
@stop

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-primary">
                    <h3 class="card-title"><i class="fas fa-fw fa-clock"></i> LLene los datos del formularío</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.turnos.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <!-- Nombre -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nombre">Nombre del Turno <b>(*)</b></label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-fw fa-clock"></i></span>
                                        </div>
                                        <input type="text" id="nombre" name="nombre" class="form-control"
                                            value="{{ old('nombre') }}" placeholder="Ej:mañana, tarde, noche" required>
                                    </div>
                                    @error('nombre')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <a href="{{ route('admin.turnos.index') }}" class="btn btn-default"><i
                                            class="fas fa-arrow-left"></i> Volver</a>
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>
                                        Guardar</button>
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

@stop

@section('js')

@stop
