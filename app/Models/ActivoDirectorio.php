<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivoDirectorio extends Model
{
    protected $table = TABLE_ACTIVO_DIRECTORIOS;

    protected $fillable = [
        'id',
        'descripcion',
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
}
