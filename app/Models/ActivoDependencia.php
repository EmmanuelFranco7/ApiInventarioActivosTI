<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivoDependencia extends Model
{
    protected $table = TABLE_ACTIVO_DEPENDENCIAS;

    protected $fillable = [
        'id',
        'activo_informacion_id',
        'dependencia_id',
        'es_maestro',
    ];

    protected $hidden = ['id'];

    public function activoInformacion()
    {
        return $this->belongsTo(ActivoInformacion::class, 'activo_informacion_id');
    }

    public function dependencia()
    {
        return $this->belongsTo(Dependencia::class, 'dependencia_id');
    }
}
