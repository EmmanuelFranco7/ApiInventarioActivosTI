<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivoUsuario extends Model
{
    protected $table = TABLE_ACTIVO_USUARIOS;

    protected $fillable = [
        'id',
        'activo_informacion_id',
        'des',
    ];

    protected $hidden = ['id'];

    public function activoInformacion()
    {
        return $this->belongsTo(ActivoInformacion::class, 'activo_informacion_id');
    }
}
