@extends('adminlte::page')

@section('content_header')
    <h1>Listado de Roles</b></h1>
    <hr class="border-top border-3 border-primary rounded">
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">

            <div class="card card-outline card-primary">
                <div class="card-header bg-primary">
                    <h3 class="card-title"><i class="fas fa-clock"></i> Roles Registrados</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.roles.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Registrar Nuevo Rol</a>

                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped table-hover table-sm" id="nivelesTable">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 10%">Nro</th>
                                <th style="width: 30%">Nombre del Rol</th>
                                <th class="text-center" style="width: 50%">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td class="d-flex justify-content-center">
                                        {{-- Editar --}}
                                        <a href="{{ route('admin.roles.edit', $role->id) }}" class="btn btn-success btn-sm mr-2">
                                            <i class="fas fa-edit" data-toggle="tooltip" title="Editar"></i>
                                        </a>
                                        {{-- Eliminar --}}
                                        <form action="{{ route('admin.roles.destroy', $role->id) }}" method="post"
                                                id="miFormulario{{ $role->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="preguntar{{ $role->id }}(event)">
                                                    <i class="fas fa-trash" data-toggle="tooltip" title="Eliminar">
                                                        </i>
                                                </button>
                                            </form>
                                        <script>
                                            function preguntar{{ $role->id }}(event) {
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
                                                        document.getElementById('miFormulario{{ $role->id }}').submit();
                                                    }
                                                });
                                            }
                                        </script>
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

    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
@stop
