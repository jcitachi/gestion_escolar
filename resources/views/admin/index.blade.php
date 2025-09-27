@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1><b>Bienvenido:</b> {{ Auth::user()->name }}</h1>
    <hr>
@stop

@section('content')
    <p>Panel administrativo</p>
    <div class="row">
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box zoomP">
                <img src="{{asset('img/colegio.gif')}}" width="70px" alt="">
                <div class="info-box-content">
                    <span class="info-box-text">Gestiones Registrados</span>
                    <span class="info-box-number">{{ $total_gestiones }} Gestiones</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box zoomP">
                <img src="{{asset('img/calendar.gif')}}" width="70px" alt="">
                <div class="info-box-content">
                    <span class="info-box-text">Periodos Registrados</span>
                    <span class="info-box-number">{{ $total_periodos }} Periodos</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box zoomP">
                <img src="{{asset('img/nivel.gif')}}" width="70px" alt="">
                <div class="info-box-content">
                    <span class="info-box-text">Niveles Registrados</span>
                    <span class="info-box-number">{{ $total_niveles }} Niveles</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box zoomP">
                <img src="{{asset('img/grado.gif')}}" width="70px" alt="">
                <div class="info-box-content">
                    <span class="info-box-text">Grados Registrados</span>
                    <span class="info-box-number">{{ $total_grados }} Grados</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box zoomP">
                <img src="{{asset('img/reloj.gif')}}" width="70px" alt="">
                <div class="info-box-content">
                    <span class="info-box-text">Turnos Registrados</span>
                    <span class="info-box-number">{{ $total_turnos }} Turnos</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box zoomP">
                <img src="{{asset('img/paralela.gif')}}" width="70px" alt="">
                <div class="info-box-content">
                    <span class="info-box-text">Paralelos Registrados</span>
                    <span class="info-box-number">{{ $total_paralelos }} Paralelos</span>
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
