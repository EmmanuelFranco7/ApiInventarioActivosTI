<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstadoActivo extends Model
{
    protected $table = TABLE_ESTADOS_ACTIVO;

    protected $fillable = [
        
        'id',       
        'description',        
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

    protected $hidden = [
        'id'
    ];

}