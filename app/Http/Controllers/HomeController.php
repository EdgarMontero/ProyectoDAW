<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Medico;
use App\Models\Paciente;
use App\Models\Consulta;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $totalUsers = User::count();
        $totalMedicos = Medico::count();
        $totalPacientes = Paciente::count();
        $totalConsultas = Consulta::count();

        // Obtener consultas mensuales
        $currentYear = Carbon::now()->year;
        $monthlyData = Consulta::selectRaw('MONTH(fecha_consulta) as month, COUNT(*) as count')
            ->whereYear('fecha_consulta', $currentYear)
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->pluck('count', 'month');

        // Crear un array con los datos de los meses
        $monthlyLabels = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
        $monthlyDataFormatted = [];

        // Formatear los datos para Chart.js
        for ($i = 1; $i <= 12; $i++) {
            $monthlyDataFormatted[] = $monthlyData->get($i, 0);
        }
        return view('home',  compact('totalUsers', 'totalMedicos', 'totalPacientes', 'totalConsultas', 'monthlyLabels', 'monthlyDataFormatted'));
    }
}
?>