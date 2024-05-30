@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Mostrar Relacion Medico Pacientes</h1>
@stop

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                    <span class="card-title">{{ __('Show') }} Relacion Medico Paciente</span>
                    <div class="float-right">
                        <a class="btn btn-primary btn-sm" href="{{ route('relacionmedicopacientes.index') }}">
                            {{ __('Back') }}</a>
                    </div>
                </div>
                <div class="card-body bg-white">
                    <div class="form-group mb-2">
                        <strong>Id Medico:</strong>
                        {{ $relacionMedicoPaciente->id_medico }}
                    </div>
                    <div class="form-group mb-2">
                        <strong>Id Paciente:</strong>
                        {{ $relacionMedicoPaciente->id_paciente }}
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