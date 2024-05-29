<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;


class RelacionMedicoPacienteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'id_medico' => 'required|string|exists:medicos,dni_medico',
            'id_paciente' => 'required|string|exists:pacientes,dni_paciente',
        ];
    }

    
}
