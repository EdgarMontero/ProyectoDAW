<?php

namespace App\Http\Controllers;

use App\Models\RelacionMedicoPaciente;
use App\Http\Requests\RelacionMedicoPacienteRequest;
use App\Models\Medico;
use App\Models\Paciente;

/**
 * Class RelacionMedicoPacienteController
 * @package App\Http\Controllers
 */
class RelacionMedicoPacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $relacionMedicoPacientes = RelacionMedicoPaciente::paginate();

        return view('relacion-medico-paciente.index', compact('relacionMedicoPacientes'))
            ->with('i', (request()->input('page', 1) - 1) * $relacionMedicoPacientes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $relacionMedicoPaciente = new RelacionMedicoPaciente();
        $medicos = Medico::all();
        $pacientes = Paciente::all();
        return view('relacion-medico-paciente.create', compact('relacionMedicoPaciente', 'medicos', 'pacientes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RelacionMedicoPacienteRequest $request)
    {
        try {
            RelacionMedicoPaciente::create($request->validated());

            return redirect()->route('relacionmedicopacientes.index')
                ->with('success', 'Relación creada exitosamente.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withErrors(['error' => 'La relación entre el médico y el paciente ya existe.'])
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($ids)
    {
        $ids = explode(',', $ids);
        $id_medico = $ids[0];
        $id_paciente = $ids[1];

        $relacionMedicoPaciente = RelacionMedicoPaciente::where('id_medico', $id_medico)
            ->where('id_paciente', $id_paciente)
            ->first();

        return view('relacion-medico-paciente.show', compact('relacionMedicoPaciente'));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($ids)
    {
        $ids = explode(',', $ids);
        $id_medico = $ids[0];
        $id_paciente = $ids[1];

        RelacionMedicoPaciente::where('id_medico', $id_medico)
            ->where('id_paciente', $id_paciente)
            ->delete();

        return redirect()->route('relacionmedicopacientes.index')
            ->with('success', 'RelacionMedicoPaciente deleted successfully');
    }
}
