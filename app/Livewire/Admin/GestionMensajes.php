<?php

namespace App\Livewire\Admin;

use App\Models\MensajeContacto;
use Livewire\Component;
use Livewire\WithPagination;

class GestionMensajes extends Component
{
    use WithPagination;

    public ?int $mensajeSeleccionado = null;

    public function ver(int $id)
    {
        $mensaje = MensajeContacto::findOrFail($id);
        $mensaje->update(['leido' => true]);
        $this->mensajeSeleccionado = $this->mensajeSeleccionado === $id ? null : $id;
    }

    public function eliminar(int $id)
    {
        MensajeContacto::findOrFail($id)->delete();
        $this->mensajeSeleccionado = null;
    }

    public function render()
    {
        return view('livewire.admin.gestion-mensajes', [
            'mensajes' => MensajeContacto::latest()->paginate(15),
        ])->layout('layouts.admin', ['titulo' => 'Mensajes']);
    }
}
