<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConsultaRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id_medico' => 'required|string|exists:medicos,dni_medico',
            'id_paciente' => 'required|string|exists:pacientes,dni_paciente',
            'tipo_consulta' => 'required|string|max:100',
            'descripcion_consulta' => 'required|string',
            'fecha_consulta' => 'required|date',
        ];
    }
}
