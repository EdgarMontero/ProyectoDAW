@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar Medico</h1>
@stop

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Medico</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('medicos.update', $medico->dni_medico) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('medico.form', ['editMode' => true])

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
@stop

@section('js')
    
@stop
