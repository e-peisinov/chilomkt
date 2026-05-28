<?php

namespace App\Livewire\Admin;

use App\Models\Configuracion;
use Livewire\Component;

class GestionConfiguraciones extends Component
{
    public array $configs = [];
    public bool $guardado = false;

    public function mount()
    {
        $configuraciones = Configuracion::all();
        foreach ($configuraciones as $config) {
            $this->configs[$config->clave] = $config->valor;
        }
    }

    public function guardar()
    {
        foreach ($this->configs as $clave => $valor) {
            Configuracion::updateOrCreate(['clave' => $clave], ['valor' => $valor]);
        }
        $this->guardado = true;
    }

    public function render()
    {
        return view('livewire.admin.gestion-configuraciones')
            ->layout('layouts.admin', ['titulo' => 'Configuracion']);
    }
}
