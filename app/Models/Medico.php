<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Medico
 *
 * @property $dni_medico
 * @property $user_id
 * @property $nombre
 * @property $especialidad
 * @property $horario
 * @property $created_at
 * @property $updated_at
 *
 * @property User $user
 * @property Consulta[] $consultas
 * @property RelacionMedicoPaciente[] $relacionMedicoPacientes
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Medico extends Model
{
    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['dni_medico', 'user_id', 'nombre', 'especialidad', 'horario'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id_user');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function consultas()
    {
        return $this->hasMany(\App\Models\Consulta::class, 'dni_medico', 'id_medico');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function relacionMedicoPacientes()
    {
        return $this->hasMany(\App\Models\RelacionMedicoPaciente::class, 'dni_medico', 'id_medico');
    }
    

}
