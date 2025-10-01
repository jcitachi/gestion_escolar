@extends('adminlte::page')

@section('content_header')
    <h1>Listado de Periodos Académicos</h1>
    <hr class="border-top border-3 border-primary rounded">
@stop

@section('content')
    @include('admin.periodos.create-modal')
    <div class="row">
        <div class="col-md-10">

            <div class="card card-outline card-primary">
                <div class="card-header bg-primary">
                    <h3 class="card-title">Periodos Registrados</h3>
                    <div class="card-tools">
                        <!-- Botón para abrir modal -->
                        <button type="button" class="btn btn-light btn-sm text-primary font-weight-bold"
                            data-toggle="modal" data-target="#ModalCreate">
                            <i class="fas fa-plus"></i> Nuevo Periodo
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped table-hover" id="nivelesTable">
                        <thead class="thead-dark">
                            <tr>
                                <th class="text-center" style="width: 5%">Nro</th>
                                <th class="text-center" style="width: 25%">Gestión</th>
                                <th class="text-center" style="width: 40%">Periodo</th>
                                <th class="text-center" style="width: 30%">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($gestiones as $gestion)
                                @foreach ($gestion->periodos as $periodo)
                                    <tr>
                                        <td class="text-center">{{ $loop->parent->iteration }}.{{ $loop->iteration }}</td>
                                        <td class="text-center align-middle">
                                            <span class="badge badge-secondary px-3 py-2">{{ $gestion->nombre }}</span>
                                        </td>
                                        <td class="align-middle">
                                            <span class="badge badge-info px-3 py-2">{{ $periodo->nombre }}</span>
                                        </td>
                                        <td class="text-center align-middle">
                                            @include('admin.periodos.edit-modal')
                                            <div class="btn-group" role="group">
                                                <!-- Botón Editar -->
                                                <button class="btn btn-sm btn-success mr-2"
                                                    data-toggle="modal" data-target="#ModalUpdate{{ $periodo->id }}">
                                                    <i class="fas fa-edit"></i> Editar
                                                </button>

                                                <!-- Botón Eliminar -->
                                                <form action="{{ route('admin.periodos.destroy', $periodo->id) }}"
                                                    method="post" id="miFormulario{{ $periodo->id }}" class="d-inline ">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="preguntar{{ $periodo->id }}(event)">
                                                        <i class="fas fa-trash"></i> Eliminar
                                                    </button>
                                                </form>
                                            </div>

                                            <!-- Script de confirmación -->
                                            <script>
                                                function preguntar{{ $periodo->id }}(event) {
                                                    event.preventDefault();
                                                    Swal.fire({
                                                        title: '¿Desea eliminar este registro?',
                                                        icon: 'warning',
                                                        showDenyButton: true,
                                                        confirmButtonText: 'Eliminar',
                                                        confirmButtonColor: '#a5161d',
                                                        denyButtonColor: '#270a0a',
                                                        denyButtonText: 'Cancelar',
                                                    }).then((result) => {
                                                        if (result.isConfirmed) {
                                                            document.getElementById('miFormulario{{ $periodo->id }}').submit();
                                                        }
                                                    });
                                                }
                                            </script>
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
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
    {{-- Estilos extra si los necesitas --}}
@stop

@section('js')
    @if ($errors->any())
        <script>
            $(document).ready(function() {
                @if (session('modal_id'))
                    $('#ModalUpdate{{ session('modal_id') }}').modal('show');
                @else
                    $('#ModalCreate').modal('show');
                @endif
            });
        </script>
    @endif
@stop
