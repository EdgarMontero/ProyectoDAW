<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RelacionMedicoPaciente
 *
 * @property $id_medico
 * @property $id_paciente
 * @property $created_at
 * @property $updated_at
 *
 * @property Medico $medico
 * @property Paciente $paciente
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class RelacionMedicoPaciente extends Model
{
    protected $primaryKey = ['id_medico', 'id_paciente'];
    public $incrementing = false;

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_medico', 'id_paciente'];

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
