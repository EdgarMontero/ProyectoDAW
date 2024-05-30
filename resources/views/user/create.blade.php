@extends('adminlte::page')

@section('title', 'Crear Usuario')

@section('content_header')
<h1>Crear Usuario</h1>
@stop

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">

            <div class="card card-default">
                <div class="card-header">
                    <span class="card-title">{{ __('Create') }} User</span>
                </div>
                <div class="card-body bg-white">
                    <form method="POST" action="{{ route('users.store') }}" role="form" enctype="multipart/form-data">
                        @csrf

                        @include('user.form')

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