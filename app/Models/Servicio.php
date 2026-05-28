<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $fillable = ['titulo', 'descripcion', 'icono', 'imagen', 'orden', 'activo'];

    protected $casts = [
        'activo' => 'boolean',
    ];

    public function scopeActivos($query)
    {
        return $query->where('activo', true)->orderBy('orden');
    }
}
