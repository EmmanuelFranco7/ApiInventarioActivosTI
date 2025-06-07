<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivoBaseDatos extends Model
{
    protected $table = TABLE_ACTIVO_BASE_DATOS;

    protected $fillable = [
        'id',
        'geston_bd_id',
        'activo_informacion_id',
        'version',
        'usuario',
        'password',
        'metodo_backup_id',
        'cantidad_licencias',
        'politica_backup',
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
