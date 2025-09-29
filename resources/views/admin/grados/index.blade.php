@extends('adminlte::page')

@section('content_header')
<<<<<<< HEAD
    <h1>Listado de Grados</b></h1>
=======
    <h1>Listado de Grados Académicos</b></h1>
>>>>>>> e641f83f14fd56ca9ba5dad13fb76a695f6d364c
    <hr class="border-top border-3 border-primary rounded">
@stop

@section('content')
    @include('admin.grados.create-modal')
    <div class="row">
<<<<<<< HEAD
        <div class="col-md-8">
=======
        <div class="col-md-6">
>>>>>>> e641f83f14fd56ca9ba5dad13fb76a695f6d364c

            <div class="card card-outline card-primary">
                <div class="card-header bg-primary">
                    <h3 class="card-title">Grados Registrados</h3>
                    <div class="card-tools">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalCreate">
<<<<<<< HEAD
                            <i class="fas fa-plus"></i> Registrar Nuevo Grado
=======
                            <i class="fas fa-plus"></i> Crear Nuevo Grado
>>>>>>> e641f83f14fd56ca9ba5dad13fb76a695f6d364c
                        </button>
                    </div>
                </div>
                <div class="card-body">
<<<<<<< HEAD
=======

>>>>>>> e641f83f14fd56ca9ba5dad13fb76a695f6d364c
                    <table class="table table-bordered table-striped table-hover table-sm" id="nivelesTable">
                        <thead>
                            <tr>
                                <th class="text-center">Nro</th>
                                <th class="text-center">Niveles</th>
                                <th>Grados</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($niveles as $nivel)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $nivel->nombre }}</td>
                                    <td>
                                        @foreach ($nivel->grados as $grado)
<<<<<<< HEAD
                                            <span class="badge badge-info">{{ $grado->nombre }}</span> <br>
=======
                                            <button class="btn btn-info btn-sm btn-block">{{ $grado->nombre }}</button> <br>
>>>>>>> e641f83f14fd56ca9ba5dad13fb76a695f6d364c
                                        @endforeach
                                    </td>
                                    <td>

                                        @foreach ($nivel->grados as $grado)
                                        @include('admin.grados.edit-modal')
                                            <div class="row justify-content-center mb-2">
                                                <!-- Aquí puedes agregar botones para editar o eliminar el nivel -->
                                                <button class="btn btn-sm btn-success mr-2" data-toggle="modal"
                                                    data-target="#ModalUpdate{{ $grado->id }}"><i
                                                        class="fas fa-edit"></i>
                                                    Editar</button>
                                                <form action="{{ route('admin.grados.destroy', $grado->id) }}"
                                                    method="post" id="miFormulario{{ $grado->id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="preguntar{{ $grado->id }}(event)">
                                                        <i class="fas fa-trash" data-toggle="tooltip" title="Eliminar">
                                                            Eliminar</i>
                                                    </button>
                                                </form>
                                            </div>
                                            <script>
                                                function preguntar{{ $grado->id }}(event) {
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
                                                            document.getElementById('miFormulario{{ $grado->id }}').submit();
                                                        }
                                                    });
                                                }
                                            </script>
                                        @endforeach

                                    </td>
                                </tr>
                            @endforeach

<<<<<<< HEAD

                        </tbody>
                    </table>
=======
                        </tbody>
                    </table>

>>>>>>> e641f83f14fd56ca9ba5dad13fb76a695f6d364c
                </div>
            </div>

        </div>
    </div>
@stop
<<<<<<< HEAD

=======
@section('footer')
    <div class="text-center py-3">
        <strong>Copyright &copy; 2025 <a href="#">Juan Carlos</a>.</strong> Todos los derechos reservados.
    </div>
@stop
>>>>>>> e641f83f14fd56ca9ba5dad13fb76a695f6d364c

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
