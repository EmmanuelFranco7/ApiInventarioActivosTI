<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivoInterfaz extends Model
{
    protected $table = TABLE_ACTIVO_INTERFAZ;

    protected $fillable = [
        'id',
        'activo_informacion_id',
        'tipo_interfaz_id',
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

    public function tipoInterfaz()
    {
        return $this->belongsTo(TipoInterfaz::class, 'tipo_interfaz_id');
    }
}
