<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonio extends Model
{
    protected $fillable = ['nombre', 'cargo', 'empresa', 'contenido', 'foto', 'orden', 'activo'];

    protected $casts = [
        'activo' => 'boolean',
    ];

    public function scopeActivos($query)
    {
        return $query->where('activo', true)->orderBy('orden');
    }
}
