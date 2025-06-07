<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoAdquisicion extends Model
{
    protected $table = TABLE_TIPO_ADQUISICION;

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

    public function activosInformacion()
    {
        return $this->hasMany(ActivoInformacion::class, 'tipo_adquisicion_id');
    }

    protected $hidden = ['id'];
}
