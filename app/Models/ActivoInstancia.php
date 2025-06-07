<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivoInstancia extends Model
{
    protected $table = TABLE_ACTIVO_INSTANCIAS;

    protected $fillable = [
        'id',
        'activo_informacion_id',
        'tipo_entorno_id',
        'servidor_nombre',
        'direccion_ip_v4',
        'direccion_ip_v6',
        'url_acceso',
        'version_instancia',
        'fecha_despliegue',
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

    public function tipoEntorno()
    {
        return $this->belongsTo(TipoEntorno::class, 'tipo_entorno_id');
    }
}
