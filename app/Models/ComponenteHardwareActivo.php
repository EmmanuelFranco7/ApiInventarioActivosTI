<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComponenteHardwareActivo extends Model
{
    protected $table = TABLE_COMPONENTES_HARDWARE_ACTIVOS;

    protected $fillable = [
        'id',
        'componente_hardware_id',
        'activo_informacion_id',
        'created_at',
    ];

    protected $hidden = ['id'];
    protected static function boot()
{
    parent::boot();

    static::creating(function ($model) {
        $model->created_at = now();
    });

}

    
}
