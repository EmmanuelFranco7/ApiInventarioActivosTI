<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tecnologia extends Model
{
    // Se asume que TABLE_TECNOLOGIAS está definida como constante en algún archivo de configuración
    protected $table = TABLE_TECNOLOGIAS;

    protected $fillable = [
        'id',
        'nombre_tecnologia',
        'version',
        'created_at',
        'updated_at',
    ];

    // Ocultar ID en las respuestas JSON si lo deseas
    protected $hidden = ['id'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->created_at = now();
        });

        static::updating(function ($model) {
            $model->updated_at = now();
        });
    }

    /**
     * Relación con ActivoTecnologia
     */
    public function activosTecnologia(): HasMany
    {
        return $this->hasMany(ActivoTecnologia::class, 'tecnologia_id');
    }
}
