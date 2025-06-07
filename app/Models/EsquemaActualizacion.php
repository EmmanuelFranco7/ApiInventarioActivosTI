<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EsquemaActualizacion extends Model
{
    protected $table = TABLE_ESQUEMA_ACTUALIZACIONES;

    protected $fillable = [
        'id',
        'descripcion',
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
