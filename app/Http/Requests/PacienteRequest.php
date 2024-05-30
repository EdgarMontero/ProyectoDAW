<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PacienteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * 
     * @return bool
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
            'dni_paciente' => [
                'required',
                'string',
                function ($attribute, $value, $fail) {
                    if (!$this->is_valid_dni($value)) {
                        $fail('El DNI no es válido.');
                    }
                }
            ],
            'user_id' => 'required',
            'nombre' => 'required|string',
            'fecha_nacimiento' => 'required|date|before_or_equal:today',
            'direccion' => 'required|string',
            'telefono' => 'required|numeric|digits:9',
        ];
    }

    /**
     * Checks if the given DNI is valid.
     *
     * @param string $dni The DNI to validate.
     * @return bool Returns true if the DNI is valid, otherwise false.
     */
    private function is_valid_dni($dni)
    {
        $letter = strtoupper(substr($dni, -1));
        $numbers = substr($dni, 0, -1);

        if (strlen($numbers) == 8 && strlen($letter) == 1 && substr("TRWAGMYFPDXBNJZSQVHLCKE", intval($numbers) % 23, 1) == $letter) {
            return true;
        }
        return false;
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'fecha_nacimiento.before_or_equal' => 'La fecha de nacimiento no puede ser una fecha futura.',
        ];
    }
}
