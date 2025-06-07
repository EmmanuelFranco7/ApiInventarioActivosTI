<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoConexion extends Model
{
    protected $table = TABLE_TIPO_CONEXION;

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

    public function interoperabilidades()
    {
        return $this->hasMany(ActivoInteroperabilidad::class, 'tipo_conexion_id');
    }

    protected $hidden = ['id'];
}
