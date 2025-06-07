<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table = TABLE_PROVEEDORES;

    protected $fillable = [
        'id',
        'nombre_proveedor',
        'contacto_nombre',
        'contacto_cargo',
        'contacto_email',
        'direccion',
        'ciudad',
        'telefono',
        'celular',
        'email_soporte',
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
