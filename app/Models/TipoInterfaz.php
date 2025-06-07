<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoInterfaz extends Model
{
    protected $table = TABLE_TIPO_INTERFAZ;

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

    public function interfazActivos()
    {
        return $this->hasMany(ActivoInterfaz::class, 'tipo_interfaz_id');
    }

    protected $hidden = ['id'];
}
