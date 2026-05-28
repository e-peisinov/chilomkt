<?php

namespace App\Livewire\Admin;

use App\Models\Servicio;
use Livewire\Component;
use Livewire\WithFileUploads;

class GestionServicios extends Component
{
    use WithFileUploads;

    public bool $mostrarModal = false;
    public ?int $servicioId = null;
    public string $titulo = '';
    public string $descripcion = '';
    public string $icono = '';
    public $imagen;
    public int $orden = 0;
    public bool $activo = true;

    protected function rules()
    {
        return [
            'titulo' => 'required|min:2|max:100',
            'descripcion' => 'required|min:10',
            'icono' => 'nullable|max:50',
            'imagen' => 'nullable|image|max:2048',
            'orden' => 'integer|min:0',
        ];
    }

    public function crear()
    {
        $this->reset(['servicioId', 'titulo', 'descripcion', 'icono', 'imagen', 'orden', 'activo']);
        $this->activo = true;
        $this->mostrarModal = true;
    }

    public function editar(int $id)
    {
        $servicio = Servicio::findOrFail($id);
        $this->servicioId = $servicio->id;
        $this->titulo = $servicio->titulo;
        $this->descripcion = $servicio->descripcion;
        $this->icono = $servicio->icono ?? '';
        $this->orden = $servicio->orden;
        $this->activo = $servicio->activo;
        $this->imagen = null;
        $this->mostrarModal = true;
    }

    public function guardar()
    {
        $this->validate();

        $datos = [
            'titulo' => $this->titulo,
            'descripcion' => $this->descripcion,
            'icono' => $this->icono,
            'orden' => $this->orden,
            'activo' => $this->activo,
        ];

        if ($this->imagen) {
            $datos['imagen'] = $this->imagen->store('servicios', 'public');
        }

        Servicio::updateOrCreate(['id' => $this->servicioId], $datos);

        $this->mostrarModal = false;
        $this->reset(['servicioId', 'titulo', 'descripcion', 'icono', 'imagen', 'orden', 'activo']);
    }

    public function eliminar(int $id)
    {
        Servicio::findOrFail($id)->delete();
    }

    public function render()
    {
        return view('livewire.admin.gestion-servicios', [
            'servicios' => Servicio::orderBy('orden')->get(),
        ])->layout('layouts.admin', ['titulo' => 'Servicios']);
    }
}
