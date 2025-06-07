<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivoCustodia extends Model
{
    protected $table = TABLE_ACTIVO_CUSTODIA;

    protected $fillable = [
        'id',
        'dependencia_id',
        'localizacion',
        'custodio_id',
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
}
