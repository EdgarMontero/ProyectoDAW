<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MedicoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $dni_medico = $this->route('medico');

        return [
            'dni_medico' => 'required|string|max:20|unique:medicos,dni_medico,' . $dni_medico . ',dni_medico',
            'user_id' => 'required|integer|exists:users,id_user',
            'nombre' => 'required|string|max:100',
            'especialidad' => 'required|string|max:100',
            'horario_inicio' => 'required|date_format:H:i',
            'horario_fin' => 'required|date_format:H:i',
        ];
    }
}
