<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MiembroEquipo extends Model
{
    protected $table = 'miembros_equipo';

    protected $fillable = ['nombre', 'cargo', 'bio', 'foto', 'linkedin', 'instagram', 'orden', 'activo'];

    protected $casts = [
        'activo' => 'boolean',
    ];

    public function scopeActivos($query)
    {
        return $query->where('activo', true)->orderBy('orden');
    }
}
