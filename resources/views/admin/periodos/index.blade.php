@extends('adminlte::page')

@section('content_header')
    <h1>Listado de Periodos Académicos</b></h1>
    <hr class="border-top border-3 border-primary rounded">
@stop

@section('content')
    @include('admin.periodos.create-modal')
    <div class="row">
        <div class="col-md-6">

            <div class="card card-outline card-primary">
                <div class="card-header bg-primary">
                    <h3 class="card-title">Periodos Registrados</h3>
                    <div class="card-tools">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalCreate">
                            <i class="fas fa-plus"></i> Registrar Nuevo Periodo
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped table-hover table-sm" id="nivelesTable">
                        <thead>
                            <tr>
                                <th class="text-center">Nro</th>
                                <th class="text-center">Gestion</th>
                                <th>Periodos</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($gestiones as $gestion)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $gestion->nombre }}</td>
                                    <td>
                                        @foreach ($gestion->periodos as $periodo)
                                            <span class="badge badge-info">{{ $periodo->nombre }}</span> <br>
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($gestion->periodos as $periodo)
                                        @include('admin.periodos.edit-modal')
                                            <div class="row justify-content-center mb-2">
                                                <!-- Aquí puedes agregar botones para editar o eliminar el nivel -->
                                                <button class="btn btn-sm btn-success mr-2" data-toggle="modal"
                                                    data-target="#ModalUpdate{{ $periodo->id }}"><i
                                                        class="fas fa-edit"></i>
                                                    Editar</button>
                                                <form action="{{ route('admin.periodos.destroy', $periodo->id) }}"
                                                    method="post" id="miFormulario{{ $periodo->id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="preguntar{{ $periodo->id }}(event)">
                                                        <i class="fas fa-trash" data-toggle="tooltip" title="Eliminar">
                                                            Eliminar</i>
                                                    </button>
                                                </form>
                                            </div>
                                            <script>
                                                function preguntar{{ $periodo->id }}(event) {
                                                    event.preventDefault();
                                                    Swal.fire({
                                                        title: '¿Desea eliminar este registro?',
                                                        text: '',
                                                        icon: 'question',
                                                        showDenyButton: true,
                                                        confirmButtonText: 'Eliminar',
                                                        confirmButtonColor: '#a5161d',
                                                        denyButtonColor: '#270a0a',
                                                        denyButtonText: 'Cancelar',
                                                    }).then((result) => {
                                                        if (result.isConfirmed) {
                                                            // JavaScript puro para enviar el formulario
                                                            document.getElementById('miFormulario{{ $periodo->id }}').submit();
                                                        }
                                                    });
                                                }
                                            </script>
                                        @endforeach
                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@stop


@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
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
