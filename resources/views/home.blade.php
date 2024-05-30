@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Inicio</h1>
@stop

@section('content')
<div class="row">
    <!-- Widget para contar el número de usuarios -->
    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $totalUsers }}</h3>
                <p>Usuarios Registrados</p>
            </div>
            <div class="icon">
                <i class="fas fa-users"></i>
            </div>
            <a href="{{ route('users.index') }}" class="small-box-footer">Más información <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <!-- Widget para contar el número de médicos -->
    <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $totalMedicos }}</h3>
                <p>Médicos Registrados</p>
            </div>
            <div class="icon">
                <i class="fas fa-user-md"></i>
            </div>
            <a href="{{ route('medicos.index') }}" class="small-box-footer">Más información <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <!-- Widget para contar el número de pacientes -->
    <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ $totalPacientes }}</h3>
                <p>Pacientes Registrados</p>
            </div>
            <div class="icon">
                <i class="fas fa-user-injured"></i>
            </div>
            <a href="{{ route('pacientes.index') }}" class="small-box-footer">Más información <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <!-- Widget para contar el número de consultas -->
    <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{ $totalConsultas }}</h3>
                <p>Consultas Realizadas</p>
            </div>
            <div class="icon">
                <i class="fas fa-notes-medical"></i>
            </div>
            <a href="{{ route('consultas.index') }}" class="small-box-footer">Más información <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>

<!-- Gráfica de consultas mensuales -->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Consultas Mensuales</h3>
            </div>
            <div class="card-body">
                <canvas id="consultasChart"></canvas>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var ctx = document.getElementById('consultasChart').getContext('2d');
        var consultasChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($monthlyLabels),
                datasets: [{
                    label: 'Consultas',
                    data: @json($monthlyDataFormatted),
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>
@stop