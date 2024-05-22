<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\ValidationException;
use Carbon\Carbon;
/**
 * Class Consulta
 *
 * @property $id_consulta
 * @property $id_medico
 * @property $id_paciente
 * @property $tipo_consulta
 * @property $descripcion_consulta
 * @property $fecha_consulta
 * @property $created_at
 * @property $updated_at
 *
 * @property Medico $medico
 * @property Paciente $paciente
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Consulta extends Model
{
    protected $primaryKey = 'id_consulta';

    protected $perPage = 100;

    public $timestamps = true;

    static $rules = [
        'id_medico' => 'required|string|exists:medicos,dni_medico',
            'id_paciente' => 'required|string|exists:pacientes,dni_paciente',
            'tipo_consulta' => 'required|string|max:100',
            'descripcion_consulta' => 'required|string',
            'fecha_consulta' => 'required|date',
            'hora_consulta' => 'required|date_format:H:i',
    ];

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_medico', 'id_paciente', 'tipo_consulta', 'descripcion_consulta', 'fecha_consulta'];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            if (Carbon::parse($model->fecha_consulta)->isFuture()) {
                throw ValidationException::withMessages([
                    'fecha_consulta' => 'La fecha de la consulta no puede ser una fecha futura.',
                ]);
            }
        });
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function medico()
    {
        return $this->belongsTo(\App\Models\Medico::class, 'id_medico', 'dni_medico');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function paciente()
    {
        return $this->belongsTo(\App\Models\Paciente::class, 'id_paciente', 'dni_paciente');
    }

    public function messages()
    {
        return [
            'id_medico.exists' => 'El DNI del médico no está registrado en la base de datos.',
            'id_paciente.exists' => 'El DNI del paciente no está registrado en la base de datos.',
        ];
    }
}
?>