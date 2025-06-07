<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComponenteHardware extends Model
{
    protected $table = TABLE_COMPONENTES_HARDWARE;

    protected $fillable = [
        'id',
        'descripcion',
        'tipo_componente_id',
        'observaciones',
        'memoria_ram',
        'disco_duro',
        'sistema_operativo',
        'ip1',
        'ip2',
        'version',
        'arquitectura',
        'procesador',
        'tipo_sistema_operativo',
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

}
