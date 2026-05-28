<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seccion extends Model
{
    protected $table = 'secciones';

    protected $fillable = ['pagina', 'clave', 'titulo', 'subtitulo', 'contenido', 'imagen'];

    public static function obtener(string $clave): ?self
    {
        return static::where('clave', $clave)->first();
    }
}
