<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use App\Http\Requests\PacienteRequest;
use App\Models\User;
use Illuminate\Http\Request;


/**
 * Class PacienteController
 * @package App\Http\Controllers
 */
class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Paciente::with('user');

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('dni_paciente', 'LIKE', "%$search%")
                    ->orWhere('nombre', 'LIKE', "%$search%")
                    ->orWhere('direccion', 'LIKE', "%$search%")
                    ->orWhere('telefono', 'LIKE', "%$search%")
                    ->orWhereHas('user', function ($q) use ($search) {
                        $q->where('name', 'LIKE', "%$search%");
                    });
            });
        }

        $pacientes = $query->paginate();

        return view('paciente.index', compact('pacientes'))
            ->with('i', (request()->input('page', 1) - 1) * $pacientes->perPage());
    }


    public function show($dni_paciente)
    {
        $paciente = Paciente::where('dni_paciente', $dni_paciente)->firstOrFail();
        return view('paciente.show', compact('paciente'));
    }

    public function edit($dni_paciente)
    {
        $paciente = Paciente::where('dni_paciente', $dni_paciente)->firstOrFail();
        $usuarios = User::all()->pluck('name', 'id_user');
        return view('paciente.edit', compact('paciente', 'usuarios'));
    }

    public function update(PacienteRequest $request, $dni_paciente)
    {
        $paciente = Paciente::where('dni_paciente', $dni_paciente)->firstOrFail();
        $paciente->update($request->validated());

        return redirect()->route('pacientes.index')->with('success', 'Paciente updated successfully');
    }

    public function destroy($dni_paciente)
    {
        Paciente::where('dni_paciente', $dni_paciente)->delete();
        return redirect()->route('pacientes.index')->with('success', 'Paciente deleted successfully');
    }

    public function create()
    {
        $paciente = new Paciente();
        $usuarios = User::all()->pluck('name', 'id_user');

        return view('paciente.create', compact('paciente', 'usuarios'));
    }

    public function store(PacienteRequest $request)
    {
        Paciente::create($request->validated());
        return redirect()->route('pacientes.index')->with('success', 'Paciente created successfully.');
    }

    public function showConsultas($dni_paciente)
    {
        $paciente = Paciente::where('dni_paciente', $dni_paciente)->firstOrFail();
        $consultas = $paciente->consultas;

        return view('paciente.consultas', compact('paciente', 'consultas'));
    }
}
