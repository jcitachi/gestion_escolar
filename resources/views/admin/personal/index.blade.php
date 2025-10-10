@extends('adminlte::page')

@section('content_header')
    <h1>Listado del Personal {{ $tipo }}</h1>
    <hr class="border-top border-3 border-primary rounded">
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">

            <div class="card card-outline card-primary">
                <div class="card-header bg-primary">
                    <h3 class="card-title"><i class="fas fa-user"></i> Personal <b>{{ $tipo }}</b> Registrado</h3>
                    <div class="card-tools">
                        <a href="{{ url('/admin/personal/create/' . $tipo) }}" class="btn btn-primary"><i
                                class="fas fa-plus"></i> Registrar Nuevo Personal</a>

                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped table-hover table-sm" id="example1">
                        <thead>
                            <tr>
                                <th>Nro</th>
                                <th>Rol</th>
                                <th>Apellidos y Nombres</th>
                                <th>Carnet de Identidad</th>
                                <th>Fecha de Nacimiento</th>
                                <th>Teléfono</th>
                                <th>Profesión</th>
                                <th>Correo</th>
                                <th>foto</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($personals as $personal)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $personal->usuario->roles->pluck('name')->implode(', ') }}</td>
                                    <td>{{ $personal->apellido }} {{ $personal->nombre }}</td>
                                    <td>{{ $personal->ci }}</td>
                                    <td>{{ $personal->fecha_nacimiento }}</td>
                                    <td>{{ $personal->telefono }}</td>
                                    <td>{{ $personal->profesion }}</td>
                                    <td>{{ $personal->usuario->email }}</td>
                                    <td>
                                        <img src="{{ url($personal->foto) }}" class="img-fluid rounded"
                                            style="width: 50px;  object-fit: cover; object-position: center;"
                                            alt="Foto de personal">
                                    </td>
                                    <td class="d-flex justify-content-center">
                                        {{-- Ver --}}
                                        <a href="{{ route('admin.personal.show', $personal->id) }}"
                                            class="btn btn-info btn-sm mr-2">
                                            <i class="fas fa-eye" data-toggle="tooltip" title="Ver"></i>
                                        </a>
                                        {{-- Editar --}}
                                        <a href="{{ route('admin.personal.edit', $personal->id) }}"
                                            class="btn btn-success btn-sm mr-2">
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
    <style>
        /* Fondo transparente y sin borde en el contenedor */
        #example1_wrapper .dt-buttons {
            background-color: transparent;
            box-shadow: none;
            border: none;
            display: flex;
            justify-content: center;
            /* Centrar los botones */
            gap: 10px;
            /* Espaciado entre botones */
            margin-bottom: 15px;
            /* Separar botones de la tabla */
        }

        /* Estilo personalizado para los botones */
        #example1_wrapper .btn {
            color: #fff;
            /* Color del texto en blanco */
            border-radius: 4px;
            /* Bordes redondeados */
            padding: 5px 15px;
            /* Espaciado interno */
            font-size: 14px;
            /* Tamaño de fuente */
        }

        /* Colores por tipo de botón */
        .btn-danger {
            background-color: #dc3545;
            border: none;
        }

        .btn-success {
            background-color: #28a745;
            border: none;
        }

        .btn-info {
            background-color: #17a2b8;
            border: none;
        }

        .btn-warning {
            background-color: #ffc107;
            border: none;
        }

        .btn-default {
            background-color: #6c757d;
            border: none;
        }
    </style>
    <style>
        /* Personalización del paginador */
        #example1_wrapper .dataTables_paginate .paginate_button {
            border-radius: 50% !important;
            /* Botones redondos */
            margin: 0 3px;
            /* Espaciado entre botones */
            border: none !important;
            padding: 6px 12px;
            background: #f0f0f0;
            color: #333 !important;
            transition: all 0.3s ease;
        }

        /* Hover */
        #example1_wrapper .dataTables_paginate .paginate_button:hover {
            background: #007bff !important;
            color: #fff !important;
        }

        /* Botón activo */
        #example1_wrapper .dataTables_paginate .paginate_button.current {
            background: #007bff !important;
            color: #fff !important;
            border-radius: 50% !important;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
        }

        /* Botones de siguiente y anterior */
        #example1_wrapper .dataTables_paginate .paginate_button.previous,
        #example1_wrapper .dataTables_paginate .paginate_button.next {
            border-radius: 20px !important;
            /* Más alargados */
            padding: 6px 16px;
        }
    </style>
    <style>
        /* Números más pequeños (círculos compactos) */
        #example1_wrapper .dataTables_paginate .paginate_button {
            border-radius: 50% !important;
            margin: 0 2px;
            border: none !important;
            padding: 4px 8px;
            /* antes era 6px 12px */
            font-size: 12px;
            /* reducir tamaño de texto */
            background: #f0f0f0;
            color: #333 !important;
            transition: all 0.3s ease;
        }

        /* Hover en los números */
        #example1_wrapper .dataTables_paginate .paginate_button:hover {
            background: #007bff !important;
            color: #fff !important;
        }

        /* Número activo */
        #example1_wrapper .dataTables_paginate .paginate_button.current {
            background: #007bff !important;
            color: #fff !important;
            border-radius: 50% !important;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.2);
        }

        /* Anterior y Siguiente más pequeños (pastillas compactas) */
        #example1_wrapper .dataTables_paginate .paginate_button.previous,
        #example1_wrapper .dataTables_paginate .paginate_button.next {
            border-radius: 20px !important;
            background: #f0f0f0;
            color: #333 !important;
            padding: 4px 10px;
            /* más pequeños */
            font-size: 12px;
            /* reducir texto */
        }

        /* Hover en Anterior y Siguiente */
        #example1_wrapper .dataTables_paginate .paginate_button.previous:hover,
        #example1_wrapper .dataTables_paginate .paginate_button.next:hover {
            background: #007bff !important;
            color: #fff !important;
        }
    </style>
@stop

@section('js')

    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "pageLength": 5,
                "language": {
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ personal",
                    "infoEmpty": "Mostrando 0 a 0 de 0 personal",
                    "infoFiltered": "(Filtrado de _MAX_ total personal)",
                    "lengthMenu": "Mostrar _MENU_ personal",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscador:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Último",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                },
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                buttons: [{
                        text: '<i class="fas fa-copy"></i> COPIAR',
                        extend: 'copy',
                        className: 'btn btn-default'
                    },
                    {
                        text: '<i class="fas fa-file-pdf"></i> PDF',
                        extend: 'pdf',
                        className: 'btn btn-danger'
                    },
                    {
                        text: '<i class="fas fa-file-csv"></i> CSV',
                        extend: 'csv',
                        className: 'btn btn-info'
                    },
                    {
                        text: '<i class="fas fa-file-excel"></i> EXCEL',
                        extend: 'excel',
                        className: 'btn btn-success'
                    },
                    {
                        text: '<i class="fas fa-print"></i> IMPRIMIR',
                        extend: 'print',
                        className: 'btn btn-warning',
                        title: '', // quitamos título por defecto
                        customize: function(win) {
                            // --- Estilos generales ---
                            $(win.document.body).css({
                                'font-family': 'Courier New, monospace',
                                'font-size': '12px',
                                'color': '#000',
                                'padding': '15px'
                            });

                            // --- Encabezado tipo boleta ---
                            $(win.document.body).prepend(`
                                <div style="text-align:center; margin-bottom:10px;">
                                    <h3 style="margin:0;">Mi Empresa S.A.C.</h3>
                                    <p style="margin:0;">RUC: 123456789</p>
                                    <p style="margin:0;">Av. Siempre Viva 742 - Lima</p>
                                    <hr style="margin:8px 0; border:0; border-top:1px dashed #000;">
                                    <h4 style="margin:0;">📑 REPORTE DE ADMINISTRATIVOS</h4>
                                    <p style="margin:0;">Fecha: ${new Date().toLocaleDateString()}</p>
                                </div>
                            `);

                            // --- Quitar columna "Acciones" ---
                            $(win.document.body).find('table thead th:last-child').remove();
                            $(win.document.body).find('table tbody td:last-child').remove();

                            // --- Tabla con líneas estilo boleta ---
                            $(win.document.body).find('table')
                                .css({
                                    'border-collapse': 'collapse',
                                    'width': '100%',
                                    'margin-top': '10px'
                                });

                            $(win.document.body).find('table thead th').css({
                                'border-bottom': '1px solid #000',
                                'text-align': 'left',
                                'padding': '4px'
                            });

                            $(win.document.body).find('table tbody td').css({
                                'border-bottom': '1px dotted #000',
                                'padding': '4px'
                            });

                            // --- Pie tipo boleta ---
                            $(win.document.body).append(`
                                <hr style="margin-top:15px; border:0; border-top:1px dashed #000;">
                                <div style="text-align:center; font-size:11px; margin-top:10px;">
                                    <p>Este documento no requiere firma ni sello.</p>
                                    <p>Generado automáticamente por el sistema</p>
                                </div>
                            `);
                        }
                    }
                ]
            }).buttons().container().appendTo('#example1_wrapper .row:eq(0)');
        });
    </script>

@stop
