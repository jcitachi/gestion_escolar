@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1><b>Bienvenido:</b> {{ Auth::user()->name }}</h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box zoomP">
                <img src="{{ asset('img/colegio.gif') }}" width="70px" alt="">
                <div class="info-box-content">
                    <span class="info-box-text">Gestiones Registradas</span>
                    <span class="info-box-number" style="color: green; font-size: 20pt">{{ $total_gestiones }} gestiones</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box zoomP">
                <img src="{{ asset('img/calendario.gif') }}" width="70px" alt="">
                <div class="info-box-content">
                    <span class="info-box-text">Periodos Registradas</span>
                    <span class="info-box-number" style="color: green; font-size: 20pt">{{ $total_periodos }} periodos</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box zoomP">
                <img src="{{ asset('img/nivel-educativo.png') }}" width="70px" alt="">
                <div class="info-box-content">
                    <span class="info-box-text">Niveles Registradas</span>
                    <span class="info-box-number" style="color: green; font-size: 20pt">{{ $total_niveles }} niveles</span>
                </div>
            </div>
        </div>
    </div>
@stop
@section('footer')
    <strong>Copyright &copy; 2025 <a href="#">Juan Carlos </a>.</strong>
    Todos los derechos reservados.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.2.0
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')

@stop
