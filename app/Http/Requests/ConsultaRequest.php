<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Consulta;

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
            'tipo_consulta' => 'required|string',
            'descripcion_consulta' => 'required|string',
            'fecha_consulta' => 'required|date',
            'estado_consulta' => 'required|string|in:pendiente,aceptada,cancelada,finalizada',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $fechaConsulta = $this->input('fecha_consulta');
            $idMedico = $this->input('id_medico');
            $idConsulta = $this->route('consulta');

            if ($this->medicoTieneConsulta($idMedico, $fechaConsulta, $idConsulta)) {
                $validator->errors()->add('fecha_consulta', 'El médico ya tiene una consulta programada en esta fecha y hora.');
            }
        });
    }

    private function medicoTieneConsulta($idMedico, $fechaConsulta, $idConsulta = null)
    {
        $query = Consulta::where('id_medico', $idMedico)
            ->where('fecha_consulta', $fechaConsulta);

        if ($idConsulta) {
            $query->where('id_consulta', '!=', $idConsulta);
        }

        return $query->exists();
    }
}
