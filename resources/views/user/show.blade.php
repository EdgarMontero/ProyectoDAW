@extends('adminlte::page')

@section('title', 'Mostrar Usuario')

@section('content_header')
<h1>Mostrar Usuario</h1>
@stop


@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                    <div class="float-left">
                        <span class="card-title">{{ __('Mostrar') }} User</span>
                    </div>
                    <div class="float-right">
                        <a class="btn btn-primary btn-sm" href="{{ route('users.index') }}"> {{ __('Back') }}</a>
                    </div>
                </div>

                <div class="card-body bg-white">

                    <div class="form-group mb-2 mb20">
                        <strong>Id User:</strong>
                        {{ $user->id_user }}
                    </div>
                    <div class="form-group mb-2 mb20">
                        <strong>Name:</strong>
                        {{ $user->name }}
                    </div>
                    <div class="form-group mb-2 mb20">
                        <strong>Email:</strong>
                        {{ $user->email }}
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