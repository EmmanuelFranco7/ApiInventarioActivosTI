<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivoConceptoTecnico extends Model
{
    protected $table = TABLE_ACTIVO_CONCEPTOS_TECNICOS;

    protected $fillable = [
        'id',
        'activo_informacion_id',
        'contenido_concepto',
        'nombre_funcionario',
        'dependencia_funcionario',
        'fecha_concepto',
        'observaciones',
        'created_at',
        'updated_at',
    ];

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

    protected $hidden = ['id'];

    public function activoInformacion()
    {
        return $this->belongsTo(ActivoInformacion::class, 'activo_informacion_id');
    }
}
