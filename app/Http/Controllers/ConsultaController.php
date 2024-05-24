<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use App\Http\Requests\ConsultaRequest;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;



/**
 * Class ConsultaController
 * @package App\Http\Controllers
 */
class ConsultaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Consulta::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('id_medico', 'LIKE', "%$search%")
                ->orWhere('id_paciente', 'LIKE', "%$search%")
                ->orWhere('tipo_consulta', 'LIKE', "%$search%")
                ->orWhere('descripcion_consulta', 'LIKE', "%$search%")
                ->orWhere('fecha_consulta', 'LIKE', "%$search%")
                ->orWhere('estado_consulta', 'LIKE', "%$search%");
            });
        }

        $consultas = $query->paginate();

        return view('consulta.index', compact('consultas'))
            ->with('i', (request()->input('page', 1) - 1) * $consultas->perPage());
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $consulta = new Consulta();
        return view('consulta.create', compact('consulta'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ConsultaRequest $request)
    {
        try {
            Consulta::create($request->validated());

            return redirect()->route('consultas.index')
                ->with('success', 'Consulta created successfully.');
        } catch (QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == 1452) {
                // Error de restricción de clave externa
                if (strpos($e->getMessage(), 'consultas_id_medico_foreign') !== false) {
                    return redirect()->back()
                        ->withInput()
                        ->withErrors(['id_medico' => 'El DNI del médico no es válido.']);
                } elseif (strpos($e->getMessage(), 'consultas_id_paciente_foreign') !== false) {
                    return redirect()->back()
                        ->withInput()
                        ->withErrors(['id_paciente' => 'El DNI del paciente no es válido.']);
                }
            }
            return redirect()->back()
                ->withInput()
                ->withErrors(['error' => 'Ocurrió un error al guardar la consulta.']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id_consulta)
    {
        $consulta = Consulta::find($id_consulta);

        return view('consulta.show', compact('consulta'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_consulta)
    {
        $consulta = Consulta::find($id_consulta);

        return view('consulta.edit', compact('consulta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ConsultaRequest $request, Consulta $consulta)
    {
        try {
            $consulta->update($request->validated());

            return redirect()->route('consultas.index')
                ->with('success', 'Consulta updated successfully');
        } catch (QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == 1452) {
                // Error de restricción de clave externa
                if (strpos($e->getMessage(), 'consultas_id_medico_foreign') !== false) {
                    return redirect()->back()
                        ->withInput()
                        ->withErrors(['id_medico' => 'El DNI del médico no es válido.']);
                } elseif (strpos($e->getMessage(), 'consultas_id_paciente_foreign') !== false) {
                    return redirect()->back()
                        ->withInput()
                        ->withErrors(['id_paciente' => 'El DNI del paciente no es válido.']);
                }
            }
            return redirect()->back()
                ->withInput()
                ->withErrors(['error' => 'Ocurrió un error al actualizar la consulta.']);
        }
    }

    public function destroy($id)
    {
        Consulta::find($id)->delete();

        return redirect()->route('consultas.index')
            ->with('success', 'Consulta deleted successfully');
    }
}
