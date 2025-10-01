@extends('adminlte::page')

@section('content_header')
    <h1 class="text-primary"><i class="fas fa-users-cog"></i> Listado de Roles</h1>
    <hr class="border-top border-3 border-primary rounded">
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card card-outline card-primary shadow-sm">
                <div class="card-header bg-primary d-flex justify-content-between align-items-center">
                    <h3 class="card-title mb-0"><i class="fas fa-clock"></i> Roles Registrados</h3>
                    <a href="{{ route('admin.roles.create') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus"></i> Registrar Nuevo Rol
                    </a>
                </div>

                <div class="card-body p-0">
                    <table class="table table-hover table-striped mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th class="text-center" style="width: 10%">Nro</th>
                                <th style="width: 40%">Nombre del Rol</th>
                                <th class="text-center" style="width: 50%">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($roles as $role)
                                <tr>
                                    <td class="text-center align-middle">{{ $loop->iteration }}</td>
                                    <td class="align-middle">{{ $role->name }}</td>
                                    <td class="text-center align-middle">
                                        <div class="btn-group" role="group">
                                            {{-- Editar --}}
                                            <a href="{{ route('admin.roles.edit', $role->id) }}"
                                               class="btn btn-success btn-sm mr-2" data-toggle="tooltip" title="Editar">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            {{-- Eliminar --}}
                                            <form action="{{ route('admin.roles.destroy', $role->id) }}"
                                                  method="post" id="miFormulario{{ $role->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="preguntar{{ $role->id }}(event)"
                                                        data-toggle="tooltip" title="Eliminar">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>

                                <script>
                                    function preguntar{{ $role->id }}(event) {
                                        event.preventDefault();
                                        Swal.fire({
                                            title: '¿Desea eliminar este rol?',
                                            text: 'Esta acción no se puede deshacer.',
                                            icon: 'warning',
                                            showDenyButton: true,
                                            confirmButtonText: 'Eliminar',
                                            confirmButtonColor: '#d33',
                                            denyButtonColor: '#6c757d',
                                            denyButtonText: 'Cancelar',
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                document.getElementById('miFormulario{{ $role->id }}').submit();
                                            }
                                        });
                                    }
                                </script>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center text-muted">No hay roles registrados.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="card-footer text-muted text-center small">
                    Total de Roles: <strong>{{ $roles->count() }}</strong>
                </div>
            </div>

        </div>
    </div>
@stop

@section('footer')
    <div class="text-center py-3">
        <strong>Copyright &copy; 2025
            <a href="#">Juan Carlos</a>.
        </strong> Todos los derechos reservados.
    </div>
@stop

@section('css')
    {{-- Aquí puedes agregar estilos personalizados si deseas --}}
@stop

@section('js')
    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
@stop
