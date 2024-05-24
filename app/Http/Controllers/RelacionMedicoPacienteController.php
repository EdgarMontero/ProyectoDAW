<?php

namespace App\Http\Controllers;

use App\Models\RelacionMedicoPaciente;
use App\Http\Requests\RelacionMedicoPacienteRequest;

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
        return view('relacion-medico-paciente.create', compact('relacionMedicoPaciente'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RelacionMedicoPacienteRequest $request)
    {
        RelacionMedicoPaciente::create($request->validated());

        return redirect()->route('relacion-medico-pacientes.index')
            ->with('success', 'RelacionMedicoPaciente created successfully.');
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
     * Show the form for editing the specified resource.
     */
    public function edit($ids)
    {
        $ids = explode(',', $ids);
        $id_medico = $ids[0];
        $id_paciente = $ids[1];
    
        $relacionMedicoPaciente = RelacionMedicoPaciente::where('id_medico', $id_medico)
                                                         ->where('id_paciente', $id_paciente)
                                                         ->first();

        return view('relacion-medico-paciente.edit', compact('relacionMedicoPaciente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RelacionMedicoPacienteRequest $request, RelacionMedicoPaciente $relacionMedicoPaciente)
    {
        $relacionMedicoPaciente->update($request->validated());

        return redirect()->route('relacionmedicopacientes.index')
            ->with('success', 'RelacionMedicoPaciente updated successfully');
    }

    public function destroy($id)
    {
        RelacionMedicoPaciente::find($id)->delete();

        return redirect()->route('relacion-medico-pacientes.index')
            ->with('success', 'RelacionMedicoPaciente deleted successfully');
    }
}
