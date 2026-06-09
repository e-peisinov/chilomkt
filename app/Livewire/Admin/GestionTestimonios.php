<?php

namespace App\Livewire\Admin;

use App\Livewire\Concerns\ValidaImagen;
use App\Models\Testimonio;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class GestionTestimonios extends Component
{
    use WithFileUploads, ValidaImagen;

    public bool $mostrarModal = false;
    public ?int $testimonioId = null;
    public string $nombre = '';
    public string $cargo = '';
    public string $empresa = '';
    public string $contenido = '';
    public $foto;
    public int $orden = 0;
    public bool $activo = true;

    protected function rules()
    {
        return [
            'nombre' => 'required|min:2|max:100',
            'cargo' => 'nullable|max:100',
            'empresa' => 'nullable|max:100',
            'contenido' => 'required|min:10',
            'foto' => $this->reglaImagen(),
            'orden' => 'integer|min:0',
        ];
    }

    public function crear()
    {
        $this->reset(['testimonioId', 'nombre', 'cargo', 'empresa', 'contenido', 'foto', 'orden', 'activo']);
        $this->activo = true;
        $this->mostrarModal = true;
    }

    public function editar(int $id)
    {
        $t = Testimonio::findOrFail($id);
        $this->testimonioId = $t->id;
        $this->nombre = $t->nombre;
        $this->cargo = $t->cargo ?? '';
        $this->empresa = $t->empresa ?? '';
        $this->contenido = $t->contenido;
        $this->orden = $t->orden;
        $this->activo = $t->activo;
        $this->foto = null;
        $this->mostrarModal = true;
    }

    public function guardar()
    {
        $this->validate();

        $datos = [
            'nombre' => $this->nombre,
            'cargo' => $this->cargo ?: null,
            'empresa' => $this->empresa ?: null,
            'contenido' => $this->contenido,
            'orden' => $this->orden,
            'activo' => $this->activo,
        ];

        if ($this->foto) {
            $datos['foto'] = $this->foto->store('testimonios', 'public');
        }

        Testimonio::updateOrCreate(['id' => $this->testimonioId], $datos);

        $this->mostrarModal = false;
        $this->reset(['testimonioId', 'nombre', 'cargo', 'empresa', 'contenido', 'foto', 'orden', 'activo']);
    }

    public function quitarFoto()
    {
        if ($this->testimonioId) {
            $testimonio = Testimonio::findOrFail($this->testimonioId);
            if ($testimonio->foto) {
                Storage::disk('public')->delete($testimonio->foto);
                $testimonio->update(['foto' => null]);
            }
        }
        $this->foto = null;
    }

    public function eliminar(int $id)
    {
        Testimonio::findOrFail($id)->delete();
    }

    public function render()
    {
        return view('livewire.admin.gestion-testimonios', [
            'testimonios' => Testimonio::orderBy('orden')->get(),
        ])->layout('layouts.admin', ['titulo' => 'Testimonios']);
    }
}
