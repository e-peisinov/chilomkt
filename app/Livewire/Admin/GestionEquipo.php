<?php

namespace App\Livewire\Admin;

use App\Models\MiembroEquipo;
use Livewire\Component;
use Livewire\WithFileUploads;

class GestionEquipo extends Component
{
    use WithFileUploads;

    public bool $mostrarModal = false;
    public ?int $miembroId = null;
    public string $nombre = '';
    public string $cargo = '';
    public string $bio = '';
    public $foto;
    public string $linkedin = '';
    public string $instagram = '';
    public int $orden = 0;
    public bool $activo = true;

    protected function rules()
    {
        return [
            'nombre' => 'required|min:2|max:100',
            'cargo' => 'required|min:2|max:100',
            'bio' => 'nullable|max:1000',
            'foto' => 'nullable|image|max:2048',
            'linkedin' => 'nullable|url|max:255',
            'instagram' => 'nullable|url|max:255',
            'orden' => 'integer|min:0',
        ];
    }

    public function crear()
    {
        $this->reset(['miembroId', 'nombre', 'cargo', 'bio', 'foto', 'linkedin', 'instagram', 'orden', 'activo']);
        $this->activo = true;
        $this->mostrarModal = true;
    }

    public function editar(int $id)
    {
        $m = MiembroEquipo::findOrFail($id);
        $this->miembroId = $m->id;
        $this->nombre = $m->nombre;
        $this->cargo = $m->cargo;
        $this->bio = $m->bio ?? '';
        $this->linkedin = $m->linkedin ?? '';
        $this->instagram = $m->instagram ?? '';
        $this->orden = $m->orden;
        $this->activo = $m->activo;
        $this->foto = null;
        $this->mostrarModal = true;
    }

    public function guardar()
    {
        $this->validate();

        $datos = [
            'nombre' => $this->nombre,
            'cargo' => $this->cargo,
            'bio' => $this->bio ?: null,
            'linkedin' => $this->linkedin ?: null,
            'instagram' => $this->instagram ?: null,
            'orden' => $this->orden,
            'activo' => $this->activo,
        ];

        if ($this->foto) {
            $datos['foto'] = $this->foto->store('equipo', 'public');
        }

        MiembroEquipo::updateOrCreate(['id' => $this->miembroId], $datos);

        $this->mostrarModal = false;
        $this->reset(['miembroId', 'nombre', 'cargo', 'bio', 'foto', 'linkedin', 'instagram', 'orden', 'activo']);
    }

    public function eliminar(int $id)
    {
        MiembroEquipo::findOrFail($id)->delete();
    }

    public function render()
    {
        return view('livewire.admin.gestion-equipo', [
            'miembros' => MiembroEquipo::orderBy('orden')->get(),
        ])->layout('layouts.admin', ['titulo' => 'Equipo']);
    }
}
