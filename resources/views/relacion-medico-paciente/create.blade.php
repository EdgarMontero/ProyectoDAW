@extends('adminlte::page')

@section('title', 'Crear Relacion Medico Pacientes')

@section('content_header')
<h1>Crear Relacion Medico Pacientes</h1>
@stop

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">
                    <span class="card-title">{{ __('Create') }} Relacion Medico Paciente</span>
                </div>
                <div class="card-body bg-white">
                    <form method="POST" action="{{ route('relacionmedicopacientes.store') }}" role="form"
                        enctype="multipart/form-data">
                        @csrf
                        @include('relacion-medico-paciente.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
@stop

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"></script>
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
    $(document).ready(function () {
        $('.ui.dropdown').dropdown();
        CKEDITOR.replace('descripcion_consulta');
    });
</script>
@stop