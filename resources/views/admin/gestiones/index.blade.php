@extends('adminlte::page')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="mb-0">Listado de Gestiones Educativas</h1>
        {{--
        <a href="{{ route('admin.gestiones.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Registrar
            Gestión</a>
        --}}
        <!-- Button del  modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#registroGestionModal">
            <i class="fas fa-plus"></i> Registrar Gestión
        </button>
    </div>
    <hr class="border-top border-3 border-primary rounded">
@stop

@section('content')
    {{-- esto es con modal registro de gestiones --}}
    @include('admin.gestiones.create-modal')
    {{-- fin del modal --}}

    {{-- listar Gestiones --}}
    <div class="row">
        @foreach ($gestiones as $gestion)
            @include('admin.gestiones.edit-modal')
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box zoomP">
                    <img src="{{ asset('img/colegio.gif') }}" width="90px" alt="Calendario">
                    <div class="info-box-content">
                        <span class="info-box-text">Gestion Educativa </span>
                        <span class="info-box-number" style="color: green; font-size: 20pt">{{ $gestion->nombre }}</span>
                        <div class="row ">
                            {{--
                            <a href="{{ route('admin.gestiones.edit', $gestion->id) }}" class="btn btn-sm btn-success mr-2"
                                data-toggle="tooltip" title="Editar">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            --}}
                            <!-- Button trigger modal -->
                            <button
                                type="button"
                                title="Editar"
                                class="btn btn-sm btn-success mr-2"
                                data-toggle="modal"
                                data-toggle-second="tooltip"
                                data-target="#modalEditar{{ $gestion->id }}">
                                <i class="fas fa-pencil-alt"></i>
                            </button>
                            <form action="{{ route('admin.gestiones.destroy', $gestion->id) }}" method="post"
                                id="miFormulario{{ $gestion->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="preguntar{{ $gestion->id }}(event)">
                                    <i class="fas fa-trash" data-toggle="tooltip" title="Eliminar"></i>
                                </button>
                            </form>
                            <script>
                                function preguntar{{ $gestion->id }}(event) {
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
                                            document.getElementById('miFormulario{{ $gestion->id }}').submit();
                                        }
                                    });
                                }
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
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
    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
            $('[data-toggle-second="tooltip"]').tooltip()
        })
    </script>
    @if ($errors->any())
        <script>
            $(document).ready(function() {
                $('#registroGestionModal').modal('show');
                $('#modalEditar{{ old('id') }}').modal('show');
            });
        </script>
    @endif

@stop
