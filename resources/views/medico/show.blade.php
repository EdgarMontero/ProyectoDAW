@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Enseñar Medico</h1>
@stop


@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Medico</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('medicos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                        <div class="form-group mb-2 mb20">
                            <strong>Dni Medico:</strong>
                            {{ $medico->dni_medico }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>User Id:</strong>
                            {{ $medico->user_id }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Nombre:</strong>
                            {{ $medico->nombre }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Especialidad:</strong>
                            {{ $medico->especialidad }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Horario:</strong>
                            {{ $medico->horario }}
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
