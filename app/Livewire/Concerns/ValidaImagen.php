<?php

namespace App\Livewire\Concerns;

trait ValidaImagen
{
    /**
     * Regla de validacion segura para subir imagenes.
     *
     * Valida en tres niveles para evitar la carga de archivos ejecutables:
     *  - image:      el archivo debe ser una imagen decodificable (getimagesize).
     *  - mimes:      la extension adivinada del contenido debe ser una de las permitidas.
     *  - mimetypes:  el MIME real (leido del contenido con finfo) debe coincidir.
     *
     * Se excluye SVG a proposito: puede contener JavaScript (riesgo de XSS).
     *
     * @param  string  $presencia  'nullable' (por defecto) o 'required'.
     */
    protected function reglaImagen(string $presencia = 'nullable'): string
    {
        return $presencia
            . '|image'
            . '|mimes:jpg,jpeg,png,webp,gif'
            . '|mimetypes:image/jpeg,image/png,image/webp,image/gif'
            . '|max:2048';
    }
}
