@extends('adminlte::page')

@section('title', 'Crear Medico')

@section('content_header')
<h1>Crear Medico</h1>
@stop

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">

            <div class="card card-default">
                <div class="card-header">
                    <span class="card-title">{{ __('Create') }} Medico</span>
                </div>
                <div class="card-body bg-white">
                    <form method="POST" action="{{ route('medicos.store') }}" role="form" enctype="multipart/form-data">
                        @csrf

                        @include('medico.form', ['editMode' => false])

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
<script>
    $(document).ready(function () {
        $('.ui.dropdown').dropdown({
            fullTextSearch: true
        });
    });
</script>
@stop