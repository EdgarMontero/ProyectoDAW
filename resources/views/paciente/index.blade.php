@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Lista de Pacientes</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">{{ __('Paciente') }}</span>

                            <div class="float-right">
                                <a href="{{ route('pacientes.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <form method="GET" action="{{ route('pacientes.index') }}" class="form-inline mb-4">
                            <input type="text" name="search" class="form-control mr-sm-2" placeholder="Buscar..." value="{{ request('search') }}">
                            <button type="submit" class="btn btn-primary">Buscar</button>
                        </form>
                        
                        <div class="table-responsive">
                            <table class="table table-striped table-hover datatable">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        <th>Dni Paciente</th>
                                        <th>User</th>
                                        <th>Nombre</th>
                                        <th>Fecha Nacimiento</th>
                                        <th>Direccion</th>
                                        <th>Telefono</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pacientes as $paciente)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $paciente->dni_paciente }}</td>
                                            <td>{{ $paciente->user->name }}</td>
                                            <td>{{ $paciente->nombre }}</td>
                                            <td>{{ $paciente->fecha_nacimiento }}</td>
                                            <td>{{ $paciente->direccion }}</td>
                                            <td>{{ $paciente->telefono }}</td>
                                            <td>
                                                <form action="{{ route('pacientes.destroy', $paciente->dni_paciente) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary" href="{{ route('pacientes.show', $paciente->dni_paciente) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('pacientes.edit', $paciente->dni_paciente) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    <a class="btn btn-sm btn-info" href="{{ route('pacientes.showConsultas', $paciente->dni_paciente) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Mostrar Consultas') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <br>
                {!! $pacientes->links() !!}
            </div>
        </div>
    </div>
@stop

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
<style>
    .pagination a {
        font-size: 16px; 
    }
    .pagination li {
        padding: 0 10px; 
    }
    .w-5, .h-5 { 
        width: 20px; 
        height: 20px; 
    }
</style>
@stop

@section('js')
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('.datatable').DataTable({
            responsive: true,
            autoWidth: false,
        });
    });
</script>
@stop
