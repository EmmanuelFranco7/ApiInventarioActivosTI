<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tecnologia extends Model
{
    protected $table = TABLE_TECNOLOGIAS;

    protected $fillable = [
        'id',
        'nombre_tecnologia',
        'version',
        'created_at',
        'updated_at',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(fn($model) => $model->created_at = now());
        static::updating(fn($model) => $model->updated_at = now());
    }

    public function activosTecnologia()
    {
        return $this->hasMany(ActivoTecnologia::class, 'tecnologia_id');
    }

    protected $hidden = ['id'];
}
