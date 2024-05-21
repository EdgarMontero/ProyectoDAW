<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConsultaRequest extends FormRequest
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
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
			'id_consulta' => 'required',
			'id_medico' => 'required|string',
			'id_paciente' => 'required|string',
			'tipo_consulta' => 'required|string',
			'descripcion_consulta' => 'required|string',
			'fecha_consulta' => 'required',
        ];
    }
}
