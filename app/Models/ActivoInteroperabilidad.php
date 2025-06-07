<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivoInteroperabilidad extends Model
{
    protected $table = TABLE_ACTIVO_INTEROPERABILIDADES;

    protected $fillable = [
        'id',
        'activo_informacion_id',
        'activo_interoperabilidad_id',
        'observaciones',
        'tipo_conexion_id',
        'protocolo_comunicacion_id',
        'nombre_conexion',
        'metodos_utilizados',
        'proposito_conexion',
        'url_conexion',
        'usuario_conexion',
        'password_conexion',
        'created_at',
        'updated_at',
    ];

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

    public function activoInformacion()
    {
        return $this->belongsTo(ActivoInformacion::class, 'activo_informacion_id');
    }
}
