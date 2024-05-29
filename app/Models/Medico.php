<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\ValidationException;


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
    protected $primaryKey = 'dni_medico';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $perPage = 100;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['dni_medico', 'user_id', 'nombre', 'especialidad', 'horario'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            self::validateUniqueUserId($model->user_id);
        });
    }

    public static function validateUniqueUserId($user_id)
    {
        if (Medico::where('user_id', $user_id)->exists()) {
            throw ValidationException::withMessages(['user_id' => 'El user_id ya está asociado con otro médico.']);
        }
    }

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
        return $this->hasMany(\App\Models\Consulta::class, 'id_medico', 'dni_medico');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function relacionMedicoPacientes()
    {
        return $this->hasMany(\App\Models\RelacionMedicoPaciente::class, 'dni_medico', 'dni_medico');
    }
}
?>
