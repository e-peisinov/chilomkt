<?php

namespace App\Livewire\Admin;

use App\Models\Cliente;
use Livewire\Component;
use Livewire\WithFileUploads;

class GestionClientes extends Component
{
    use WithFileUploads;

    public bool $mostrarModal = false;
    public ?int $clienteId = null;
    public string $nombre = '';
    public $logo;
    public string $sitio_web = '';
    public string $descripcion = '';
    public int $orden = 0;
    public bool $activo = true;

    protected function rules()
    {
        return [
            'nombre' => 'required|min:2|max:100',
            'logo' => 'nullable|image|max:2048',
            'sitio_web' => 'nullable|url|max:255',
            'descripcion' => 'nullable|max:500',
            'orden' => 'integer|min:0',
        ];
    }

    public function crear()
    {
        $this->reset(['clienteId', 'nombre', 'logo', 'sitio_web', 'descripcion', 'orden', 'activo']);
        $this->activo = true;
        $this->mostrarModal = true;
    }

    public function editar(int $id)
    {
        $cliente = Cliente::findOrFail($id);
        $this->clienteId = $cliente->id;
        $this->nombre = $cliente->nombre;
        $this->sitio_web = $cliente->sitio_web ?? '';
        $this->descripcion = $cliente->descripcion ?? '';
        $this->orden = $cliente->orden;
        $this->activo = $cliente->activo;
        $this->logo = null;
        $this->mostrarModal = true;
    }

    public function guardar()
    {
        $this->validate();

        $datos = [
            'nombre' => $this->nombre,
            'sitio_web' => $this->sitio_web ?: null,
            'descripcion' => $this->descripcion,
            'orden' => $this->orden,
            'activo' => $this->activo,
        ];

        if ($this->logo) {
            $datos['logo'] = $this->logo->store('clientes', 'public');
        }

        Cliente::updateOrCreate(['id' => $this->clienteId], $datos);

        $this->mostrarModal = false;
        $this->reset(['clienteId', 'nombre', 'logo', 'sitio_web', 'descripcion', 'orden', 'activo']);
    }

    public function eliminar(int $id)
    {
        Cliente::findOrFail($id)->delete();
    }

    public function render()
    {
        return view('livewire.admin.gestion-clientes', [
            'clientes' => Cliente::orderBy('orden')->get(),
        ])->layout('layouts.admin', ['titulo' => 'Clientes']);
    }
}
