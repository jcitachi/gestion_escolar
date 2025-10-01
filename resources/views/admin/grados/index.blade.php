@extends('adminlte::page')

@section('content_header')
    <h1 class="mb-3">Listado de Grados Académicos</h1>
    <hr class="border-top border-3 border-primary rounded">
@stop

@section('content')
    @include('admin.grados.create-modal')

    <div class="card card-outline card-primary shadow-sm">
        <div class="card-header bg-primary d-flex justify-content-between align-items-center">
            <h3 class="card-title mb-0">
                <i class="fas fa-list"></i> Grados Registrados
            </h3>
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ModalCreate">
                <i class="fas fa-plus"></i> Registrar Nuevo Grado
            </button>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-striped align-middle" id="nivelesTable">
                    <thead class="table-light">
                        <tr>
                            <th class="text-center">Nro</th>
                            <th class="text-center">Nivel</th>
                            <th>Grado</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($niveles as $nivel)
                            @foreach ($nivel->grados as $grado)
                                <tr>
                                    {{-- Índice jerárquico (1.1, 1.2, etc.) --}}
                                    <td class="text-center">
                                        {{ $loop->parent->iteration }}.{{ $loop->iteration }}
                                    </td>

                                    {{-- Nivel --}}
                                    <td class="fw-bold text-center">
                                        {{ $nivel->nombre }}
                                    </td>

                                    {{-- Grado --}}
                                    <td>
                                        <span class="badge bg-info">
                                            <i class="fas fa-graduation-cap"></i> {{ $grado->nombre }}
                                        </span>
                                    </td>

                                    {{-- Acciones --}}
                                    <td class="text-center">
                                        @include('admin.grados.edit-modal')
                                        <div class="btn-group" role="group">
                                            <button class="btn btn-sm btn-success mr-2" data-toggle="modal"
                                                data-target="#ModalUpdate{{ $grado->id }}">
                                                <i class="fas fa-edit"></i> Editar
                                            </button>

                                            <form action="{{ route('admin.grados.destroy', $grado->id) }}"
                                                method="post" id="miFormulario{{ $grado->id }}" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="preguntar{{ $grado->id }}(event)">
                                                    <i class="fas fa-trash-alt"></i> Eliminar
                                                </button>
                                            </form>
                                        </div>

                                        {{-- Script de confirmación --}}
                                        <script>
                                            function preguntar{{ $grado->id }}(event) {
                                                event.preventDefault();
                                                Swal.fire({
                                                    title: '¿Desea eliminar este registro?',
                                                    icon: 'warning',
                                                    showDenyButton: true,
                                                    confirmButtonText: 'Eliminar',
                                                    confirmButtonColor: '#d33',
                                                    denyButtonColor: '#6c757d',
                                                    denyButtonText: 'Cancelar',
                                                }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        document.getElementById('miFormulario{{ $grado->id }}').submit();
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
@stop

@section('footer')
    <div class="text-center py-3">
        <strong>Copyright &copy; 2025 <a href="#">Juan Carlos</a>.</strong>
        Todos los derechos reservados.
    </div>
@stop

@section('css')
    {{-- Aquí puedes poner estilos extra si quieres --}}
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
