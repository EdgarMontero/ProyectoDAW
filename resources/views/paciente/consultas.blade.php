@extends('adminlte::page')

@section('title', 'Consultas de ' . $paciente->nombre)

@section('content_header')
<h1>Consultas de {{ $paciente->nombre }}</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body bg-white">
                    @if($consultas->isEmpty())
                        <p>No hay consultas para este paciente.</p>
                    @else
                        <div class="table-responsive">
                            <table class="table table-striped table-hover datatable">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        <th>Tipo Consulta</th>
                                        <th>Descripción</th>
                                        <th>Fecha Consulta</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($consultas as $consulta)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $consulta->tipo_consulta }}</td>
                                            <td>{!! $consulta->descripcion_consulta !!}</td>
                                            <td>{{ $consulta->fecha_consulta }}</td>
                                            <td>
                                                <form action="{{ route('consultas.destroy', $consulta->id_consulta) }}"
                                                    method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('consultas.show', $consulta->id_consulta) }}"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}</a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('consultas.edit', $consulta->id_consulta) }}"><i
                                                            class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                                            class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
            <a href="{{ route('pacientes.index') }}" class="btn btn-primary">Volver</a>
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
        /* Ajusta el tamaño de la fuente */
    }

    .pagination li {
        padding: 0 10px;
        /* Ajusta el padding */
    }

    .w-5,
    .h-5 {
        /* Asegúrate de que estas clases estén definidas */
        width: 20px;
        /* Ancho del SVG */
        height: 20px;
        /* Alto del SVG */
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