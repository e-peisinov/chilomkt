<?php

namespace App\Livewire\Paginas;

use App\Models\MiembroEquipo;
use App\Models\Seccion;
use Livewire\Component;

class Nosotros extends Component
{
    public function render()
    {
        $historiaSeccion = Seccion::obtener('nosotros_historia');
        $estadisticasSeccion = Seccion::obtener('nosotros_estadisticas');
        $valoresSeccion = Seccion::obtener('nosotros_valores');
        $equipoIntro = Seccion::obtener('nosotros_equipo_intro');
        $ctaSeccion = Seccion::obtener('nosotros_cta');

        return view('livewire.paginas.nosotros', [
            'hero' => Seccion::obtener('nosotros_hero'),
            'historiaSeccion' => $historiaSeccion,
            'mision' => Seccion::obtener('mision'),
            'vision' => Seccion::obtener('vision'),
            'miembros' => MiembroEquipo::activos()->get(),
            'estadisticas' => $estadisticasSeccion ? json_decode($estadisticasSeccion->contenido, true) ?? [] : [],
            'valoresSeccion' => $valoresSeccion,
            'valores' => $valoresSeccion ? json_decode($valoresSeccion->contenido, true) ?? [] : [],
            'equipoIntro' => $equipoIntro,
            'ctaSeccion' => $ctaSeccion,
        ])->layout('layouts.publica', ['titulo' => 'Nosotros - ChiloMkt']);
    }
}
