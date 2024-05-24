@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar Consulta</h1>
@stop

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Consulta</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('consultas.update', $consulta->id_consulta) }}" role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('consulta.form')

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
