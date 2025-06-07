<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DependenciaExterna extends Model
{
    protected $table = TABLE_DEPENDENCIAS_EXTERNAS;

    protected $fillable = [
        'id',
        'activo_informacion_id',
        'nombre_dependencia',
        'licenciamiento',
        'descripcion_uso',
        'observaciones',
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
