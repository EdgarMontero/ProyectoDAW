<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consulta;

class CalendarioController extends Controller
{
    public function index()
    {
        return view('calendario');
    }

    public function consultas(Request $request)
    {
        $dniMedico = $request->get('dni_medico');
        $consultas = Consulta::where('id_medico', $dniMedico)->get(['id_consulta as id', 'fecha_consulta as start', 'tipo_consulta as title', 'descripcion_consulta as description']);

        return response()->json($consultas);
    }
}
