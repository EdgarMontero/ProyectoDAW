@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Lista de Usuarios</h1>
@stop


@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('User') }}
                        </span>

                        <div class="float-right">
                            <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm float-right"
                                data-placement="left">
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

                                    <th>Name</th>
                                    <th>Email</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ ++$i }}</td>

                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>

                                        <td>
                                            <form action="{{ route('users.destroy', $user->id_user) }}" method="POST">
                                                <a class="btn btn-sm btn-primary "
                                                    href="{{ route('users.show', $user->id_user) }}"><i
                                                        class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}</a>
                                                <a class="btn btn-sm btn-success"
                                                    href="{{ route('users.edit', $user->id_user) }}"><i
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
                </div>
            </div>
            {!! $users->links() !!}
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