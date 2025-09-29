@extends('adminlte::page')

@section('content_header')
    <h1>Listado del Personal {{ $tipo }}</h1>
    <hr class="border-top border-3 border-primary rounded">
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">

            <div class="card card-outline card-primary">
                <div class="card-header bg-primary">
                    <h3 class="card-title"><i class="fas fa-user"></i> Personal <b>{{ $tipo }}</b> Registrado</h3>
                    <div class="card-tools">
                        <a href="{{ url('/admin/personal/create/'. $tipo) }}" class="btn btn-primary"><i class="fas fa-plus"></i> Registrar Nuevo Personal</a>

                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped table-hover table-sm" id="nivelesTable">
                        <thead>
                            <tr>
                                <th >Nro</th>
                                <th >Nombre del Rol</th>
                                <th >Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($personals as $personal)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $personal->nombre }}</td>
                                    <td class="d-flex justify-content-center">
                                        {{-- Editar --}}
                                        <a href="{{ route('admin.personal.edit', $personal->id) }}" class="btn btn-success btn-sm mr-2">
                                            <i class="fas fa-edit" data-toggle="tooltip" title="Editar"></i>
                                        </a>
                                        {{-- Eliminar --}}
                                        <form action="{{ route('admin.personal.destroy', $personal->id) }}" method="post"
                                                id="miFormulario{{ $personal->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="preguntar{{ $personal->id }}(event)">
                                                    <i class="fas fa-trash" data-toggle="tooltip" title="Eliminar">
                                                        </i>
                                                </button>
                                            </form>
                                        <script>
                                            function preguntar{{ $personal->id }}(event) {
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
                                                        document.getElementById('miFormulario{{ $personal->id }}').submit();
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
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
@stop
