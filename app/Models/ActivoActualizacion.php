<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivoActualizacion extends Model
{
    protected $table = TABLE_ACTIVO_ACTUALIZACION;

    protected $fillable = [
        'id',
        'descripcion',
        'activo_informacion_id',
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
