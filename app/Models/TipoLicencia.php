<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoLicencia extends Model
{
    protected $table = TABLE_TIPO_LICENCIA;

    protected $fillable = [
        'id',
        'descripcion',
        'created_at',
        'updated_at',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(fn($model) => $model->created_at = now());
        static::updating(fn($model) => $model->updated_at = now());
    }

    public function requerimientosSoftware()
    {
        return $this->hasMany(ActivoRequerimientoSoftware::class, 'tipo_licencia_id');
    }

    protected $hidden = ['id'];
}
