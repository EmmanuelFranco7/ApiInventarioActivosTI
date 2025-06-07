<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoEntorno extends Model
{
    protected $table = TABLE_TIPO_ENTORNO;

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

    public function instancias()
    {
        return $this->hasMany(ActivoInstancia::class, 'tipo_entorno_id');
    }

    protected $hidden = ['id'];
}
