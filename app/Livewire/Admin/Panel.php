<?php

namespace App\Livewire\Admin;

use App\Models\Cliente;
use App\Models\MensajeContacto;
use App\Models\Servicio;
use Livewire\Component;

class Panel extends Component
{
    public function render()
    {
        return view('livewire.admin.panel', [
            'totalServicios' => Servicio::count(),
            'totalClientes' => Cliente::count(),
            'mensajesNoLeidos' => MensajeContacto::where('leido', false)->count(),
            'ultimosMensajes' => MensajeContacto::latest()->take(5)->get(),
        ])->layout('layouts.admin', ['titulo' => 'Panel']);
    }
}
