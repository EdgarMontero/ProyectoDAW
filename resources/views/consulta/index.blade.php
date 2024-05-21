@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Lista de Consultas</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{ __('Consulta') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('consultas.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
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
                        <div class="table-responsive">
                            <table class="table table-striped table-hover datatable">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        <th>Id Consulta</th>
                                        <th>Id Medico</th>
                                        <th>Id Paciente</th>
                                        <th>Tipo Consulta</th>
                                        <th>Descripcion Consulta</th>
                                        <th>Fecha Consulta</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($consultas as $consulta)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $consulta->id_consulta }}</td>
                                            <td>{{ $consulta->id_medico }}</td>
                                            <td>{{ $consulta->id_paciente }}</td>
                                            <td>{{ $consulta->tipo_consulta }}</td>
                                            <td>{{ $consulta->descripcion_consulta }}</td>
                                            <td>{{ $consulta->fecha_consulta }}</td>
                                            <td>
                                                <form action="{{ route('consultas.destroy', $consulta->id_consulta) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('consultas.show', $consulta->id_consulta) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('consultas.edit', $consulta->id_consulta) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
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
