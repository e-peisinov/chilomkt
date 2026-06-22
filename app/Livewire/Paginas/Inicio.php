<?php

namespace App\Livewire\Paginas;

use App\Models\Cliente;
use App\Models\Seccion;
use App\Models\Servicio;
use Livewire\Component;

class Inicio extends Component
{
    public function render()
    {
        $procesoSeccion = Seccion::obtener('inicio_proceso');
        $estadisticasSeccion = Seccion::obtener('inicio_estadisticas');
        $ctaSeccion = Seccion::obtener('inicio_cta');

        return view('livewire.paginas.inicio', [
            'hero' => Seccion::obtener('hero'),
            'serviciosIntro' => Seccion::obtener('servicios_intro'),
            'clientesIntro' => Seccion::obtener('clientes_intro'),
            'servicios' => Servicio::activos()->take(6)->get(),
            'clientes' => Cliente::activos()->get(),
            'estadisticas' => $estadisticasSeccion ? json_decode($estadisticasSeccion->contenido, true) ?? [] : [],
            'procesoSeccion' => $procesoSeccion,
            'pasos' => $procesoSeccion ? json_decode($procesoSeccion->contenido, true) ?? [] : [],
            'ctaSeccion' => $ctaSeccion,
        ])->layout('layouts.publica', ['titulo' => 'ChiloMkt - Marketing Digital & Mentalidad']);
    }
}
