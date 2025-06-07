<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoBaseDatos extends Model
{
    protected $table = TABLE_TIPO_BASE_DATOS;

    protected $fillable = [
        'id',
        'nombre',
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
}
