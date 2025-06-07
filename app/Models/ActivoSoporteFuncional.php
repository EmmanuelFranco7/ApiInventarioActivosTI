<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivoSoporteFuncional extends Model
{
    protected $table = TABLE_ACTIVO_SOPORTE_FUNCIONAL;

    protected $fillable = [
        'id',
        'usuario_id',
        'proveedor_id',
        'activo_informacion_id',
        'dependencia_id',
        'tiene_plataforma',
        'plataforma_detalle',
        'disponibilidad_sla_id',
        'fecha_vencimiento',
        'observaciones',
        'email',
        'celular',
        'telefono',
        'direccion',
        'ciudad_id',
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
