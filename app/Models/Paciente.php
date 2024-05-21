<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Paciente
 *
 * @property $dni_paciente
 * @property $user_id
 * @property $nombre
 * @property $fecha_nacimiento
 * @property $direccion
 * @property $telefono
 * @property $created_at
 * @property $updated_at
 *
 * @property User $user
 * @property Consulta[] $consultas
 * @property RelacionMedicoPaciente[] $relacionMedicoPacientes
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Paciente extends Model
{
    protected $primaryKey = 'dni_paciente';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $perPage = 100;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['dni_paciente', 'user_id', 'nombre', 'fecha_nacimiento', 'direccion', 'telefono'];

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
        return $this->hasMany(\App\Models\Consulta::class, 'id_paciente', 'dni_paciente');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function relacionMedicoPacientes()
    {
        return $this->hasMany(\App\Models\RelacionMedicoPaciente::class, 'dni_paciente', 'dni_paciente');
    }
}
?>