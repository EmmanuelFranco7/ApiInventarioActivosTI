<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivoProceso extends Model
{
    protected $table = TABLE_ACTIVO_PROCESOS;

    protected $fillable = [
        'id',
        'activo_informacion_id',
        'proceso_id',
    ];

    protected $hidden = ['id'];

    public function activoInformacion()
    {
        return $this->belongsTo(ActivoInformacion::class, 'activo_informacion_id');
    }

    public function proceso()
    {
        return $this->belongsTo(Proceso::class, 'proceso_id');
    }
}
