<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NivelCriticidad extends Model
{
    protected $table = TABLE_NIVELES_CRITICIDAD;

    protected $fillable = [
        'id',
        'nombre',
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
