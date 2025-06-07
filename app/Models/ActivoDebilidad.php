<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivoDebilidad extends Model
{
    protected $table = TABLE_ACTIVO_DEBILIDADES;

    protected $fillable = [
        'id',
        'activo_informacion_id',
        'debilidad',
        'descripcion',
        'observaciones',
        'created_at',
        'updated_at',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(fn($model) => $model->created_at = now());
        static::updating(fn($model) => $model->updated_at = now());
    }

    protected $hidden = ['id'];

    public function activoInformacion()
    {
        return $this->belongsTo(ActivoInformacion::class, 'activo_informacion_id');
    }
}
