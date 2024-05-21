<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Consulta
 *
 * @property $id_consulta
 * @property $id_medico
 * @property $id_paciente
 * @property $tipo_consulta
 * @property $descripcion_consulta
 * @property $fecha_consulta
 *
 * @property Medico $medico
 * @property Paciente $paciente
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Consulta extends Model
{
    
    protected $primaryKey = "id_consulta";
    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_consulta', 'id_medico', 'id_paciente', 'tipo_consulta', 'descripcion_consulta', 'fecha_consulta'];


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
    

}
