<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivoArchivo extends Model
{
    protected $table = TABLE_ACTIVO_ARCHIVOS;

    protected $fillable = [
        'id',
        'activo_informacion_id',
        'tipo',
        'directorio',
        'url',
        'descripcion',
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
