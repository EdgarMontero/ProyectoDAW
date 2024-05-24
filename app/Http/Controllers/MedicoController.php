<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use App\Http\Requests\MedicoRequest;
use Illuminate\Http\Request;
use App\Models\User;


class MedicoController extends Controller
{
    public function index(Request $request)
    {
        $query = Medico::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('dni_medico', 'LIKE', "%$search%")
                  ->orWhere('user_id', 'LIKE', "%$search%")
                  ->orWhere('nombre', 'LIKE', "%$search%")
                  ->orWhere('especialidad', 'LIKE', "%$search%")
                  ->orWhere('horario', 'LIKE', "%$search%");
            });
        }

        $medicos = $query->paginate(10); // Ajusta el número de elementos por página

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
        $usuarios = User::all()->pluck('name', 'id_user');
        return view('medico.edit', compact('medico', 'usuarios'));
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
        $usuarios = User::all()->pluck('name', 'id_user');

        return view('medico.create', compact('medico', 'usuarios'));
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

    public function showConsultas($dni_medico)
    {
        $medico = Medico::where('dni_medico', $dni_medico)->firstOrFail();
        $consultas = $medico->consultas;

        return view('medico.consultas', compact('medico', 'consultas'));
    }
}
