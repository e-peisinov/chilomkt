<?php

namespace App\Livewire\Paginas;

use App\Models\Seccion;
use App\Models\Servicio;
use Livewire\Component;

class Servicios extends Component
{
    public function render()
    {
        return view('livewire.paginas.servicios', [
            'servicios' => Servicio::activos()->get(),
            'heroSeccion' => Seccion::obtener('servicios_hero'),
            'ctaSeccion' => Seccion::obtener('servicios_cta'),
        ])->layout('layouts.publica', ['titulo' => 'Servicios - ChiloMkt']);
    }
}
