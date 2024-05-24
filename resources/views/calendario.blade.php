@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Calendario</h1>
@stop

@section('content')
    <div class="container">
        <h1>Esta es la vista del Calendario</h1>
        <div class="form-group">
            <label for="dni_medico">DNI del Médico:</label>
            <input type="text" id="dni_medico" class="form-control" placeholder="Ingrese el DNI del médico">
        </div>
        <button id="load_calendar" class="btn btn-primary">Cargar Calendario</button>
        <div id="calendar"></div>
    </div>
@stop

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" rel="stylesheet">
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/locale/es.js"></script>
<script>
    $(document).ready(function() {
        // Función para cargar el calendario con el DNI del médico
        function loadCalendar(dniMedico) {
            if (dniMedico) {
                $('#calendar').fullCalendar('destroy');
                $('#calendar').fullCalendar({
                    locale: 'es',
                    events: {
                        url: '/calendario/consultas',
                        type: 'GET',
                        data: {
                            dni_medico: dniMedico
                        },
                        error: function() {
                            alert('No se pudieron cargar las consultas.');
                        }
                    },
                    eventClick: function(event) {
                        window.location.href = '/consultas/' + event.id + '/edit';
                    }
                });
            } else {
                alert('Por favor, ingrese el DNI del médico.');
            }
        }

        // Cargar el DNI del almacenamiento local y cargar el calendario si está presente
        var storedDniMedico = localStorage.getItem('dni_medico');
        if (storedDniMedico) {
            $('#dni_medico').val(storedDniMedico);
            loadCalendar(storedDniMedico);
        }

        // Evento para cargar el calendario al hacer clic en el botón
        $('#load_calendar').on('click', function() {
            var dniMedico = $('#dni_medico').val();
            if (dniMedico) {
                // Guardar el DNI en el almacenamiento local
                localStorage.setItem('dni_medico', dniMedico);
                loadCalendar(dniMedico);
            } else {
                alert('Por favor, ingrese el DNI del médico.');
            }
        });
    });
</script>
@stop
