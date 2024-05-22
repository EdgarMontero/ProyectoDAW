<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use App\Http\Requests\MedicoRequest;

/**
 * Class MedicoController
 * @package App\Http\Controllers
 */
class MedicoController extends Controller
{
    public function index()
    {
        $medicos = Medico::paginate();

        return view('medico.index', compact('medicos'))
            ->with('i', (request()->input('page', 1) - 1) * $medicos->perPage());
    }

    public function show($dni_medico)
    {
        $medico = Medico::where('dni_medico', $dni_medico)->firstOrFail();
        return view('medico.show', compact('medico'));
    }

    public function edit($dni_medico)
    {
        $medico = Medico::where('dni_medico', $dni_medico)->firstOrFail();
        return view('medico.edit', compact('medico'));
    }

    public function update(MedicoRequest $request, $dni_medico)
    {
        $medico = Medico::where('dni_medico', $dni_medico)->firstOrFail();
        $horario = $request->input('horario_inicio') . ' - ' . $request->input('horario_fin');
        $data = $request->validated();
        $data['horario'] = $horario;
        $medico->update($data);
        return redirect()->route('medicos.index')->with('success', 'Medico updated successfully');
    }

    public function destroy($dni_medico)
    {
        Medico::where('dni_medico', $dni_medico)->delete();
        return redirect()->route('medicos.index')->with('success', 'Medico deleted successfully');
    }

    public function create()
    {
        $medico = new Medico();
        return view('medico.create', compact('medico'));
    }

    public function store(MedicoRequest $request)
    {
        $horario = $request->input('horario_inicio') . ' - ' . $request->input('horario_fin');
        $data = $request->validated();
        $data['horario'] = $horario;
        Medico::create($data);

        return redirect()->route('medicos.index')
            ->with('success', 'Medico created successfully.');
    }
}
