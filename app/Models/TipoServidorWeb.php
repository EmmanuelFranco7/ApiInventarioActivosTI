<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoServidorWeb extends Model
{
    protected $table = TABLE_TIPO_SERVIDOR_WEB;

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
