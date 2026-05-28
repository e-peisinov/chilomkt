<?php

namespace App\Livewire\Admin;

use App\Models\Seccion;
use Livewire\Component;
use Livewire\WithFileUploads;

class GestionSecciones extends Component
{
    use WithFileUploads;

    public bool $mostrarModal = false;
    public ?int $seccionId = null;
    public string $titulo = '';
    public string $subtitulo = '';
    public string $contenido = '';
    public $imagen;

    public function editar(int $id)
    {
        $s = Seccion::findOrFail($id);
        $this->seccionId = $s->id;
        $this->titulo = $s->titulo ?? '';
        $this->subtitulo = $s->subtitulo ?? '';
        $this->contenido = $s->contenido ?? '';
        $this->imagen = null;
        $this->mostrarModal = true;
    }

    public function guardar()
    {
        $this->validate([
            'titulo' => 'nullable|max:200',
            'subtitulo' => 'nullable|max:300',
            'contenido' => 'nullable',
            'imagen' => 'nullable|image|max:2048',
        ]);

        $seccion = Seccion::findOrFail($this->seccionId);
        $seccion->titulo = $this->titulo ?: null;
        $seccion->subtitulo = $this->subtitulo ?: null;
        $seccion->contenido = $this->contenido ?: null;

        if ($this->imagen) {
            $seccion->imagen = $this->imagen->store('secciones', 'public');
        }

        $seccion->save();
        $this->mostrarModal = false;
    }

    public function render()
    {
        return view('livewire.admin.gestion-secciones', [
            'secciones' => Seccion::orderBy('pagina')->get(),
        ])->layout('layouts.admin', ['titulo' => 'Secciones']);
    }
}
