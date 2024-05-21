@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Enseñar Consulta</h1>
@stop

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Consulta</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('consultas.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                        <div class="form-group mb-2 mb20">
                            <strong>Id Consulta:</strong>
                            {{ $consulta->id_consulta }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Id Medico:</strong>
                            {{ $consulta->id_medico }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Id Paciente:</strong>
                            {{ $consulta->id_paciente }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Tipo Consulta:</strong>
                            {{ $consulta->tipo_consulta }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Descripcion Consulta:</strong>
                            {{ $consulta->descripcion_consulta }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Fecha Consulta:</strong>
                            {{ $consulta->fecha_consulta }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
@stop

@section('js')
    
@stop