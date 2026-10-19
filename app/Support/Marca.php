<?php

namespace App\Support;

use Illuminate\Support\HtmlString;

/**
 * Ayudas de la gramática de marca CHILO para textos que vienen del CMS.
 */
class Marca
{
    /**
     * Escapa el texto y convierte lo marcado entre *asteriscos* en remate
     * manuscrito (como "Somos dos que se *animaron.*"). Los saltos de línea
     * se respetan.
     */
    public static function remate(?string $texto): HtmlString
    {
        $html = e((string) $texto);
        $html = preg_replace('/\*(.+?)\*/u', '<span class="remate">$1</span>', $html);

        return new HtmlString(nl2br($html, false));
    }

    /**
     * Separa una descripción de servicio en titular (primera línea) y texto
     * (el resto). Si tiene una sola línea, el titular queda vacío.
     *
     * @return array{0: string, 1: string}
     */
    public static function partir(?string $texto): array
    {
        $lineas = preg_split('/\R/u', trim((string) $texto), 2);

        return count($lineas) === 2 ? [trim($lineas[0]), trim($lineas[1])] : ['', trim($lineas[0])];
    }

    /** Número de WhatsApp en formato wa.me (solo dígitos). */
    public static function whatsapp(?string $numero, string $mensaje = ''): string
    {
        $url = 'https://wa.me/'.preg_replace('/\D/', '', (string) $numero);

        return $mensaje !== '' ? $url.'?text='.rawurlencode($mensaje) : $url;
    }
}
