<?php

namespace App\Livewire\Admin;

use App\Livewire\Concerns\ValidaImagen;
use App\Models\Configuracion;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class GestionConfiguraciones extends Component
{
    use WithFileUploads, ValidaImagen;

    public array $configs = [];
    public $logoUpload;
    public bool $guardado = false;

    public function mount()
    {
        $configuraciones = Configuracion::all();
        foreach ($configuraciones as $config) {
            $this->configs[$config->clave] = $config->valor;
        }

        // Valores por defecto del logo si aun no existen
        $this->configs['logo_modo'] = $this->configs['logo_modo'] ?? 'ambos';
        $this->configs['logo_texto'] = $this->configs['logo_texto'] ?? ($this->configs['nombre_sitio'] ?? 'ChiloMkt');
        $this->configs['logo_imagen'] = $this->configs['logo_imagen'] ?? '';
    }

    public function quitarLogo()
    {
        if (! empty($this->configs['logo_imagen'])) {
            Storage::disk('public')->delete($this->configs['logo_imagen']);
            $this->configs['logo_imagen'] = '';
            Configuracion::updateOrCreate(['clave' => 'logo_imagen'], ['valor' => '']);
        }
    }

    public function guardar()
    {
        $this->validate([
            'logoUpload' => $this->reglaImagen(),
        ]);

        if ($this->logoUpload) {
            if (! empty($this->configs['logo_imagen'])) {
                Storage::disk('public')->delete($this->configs['logo_imagen']);
            }
            $this->configs['logo_imagen'] = $this->logoUpload->store('logo', 'public');
            $this->logoUpload = null;
        }

        foreach ($this->configs as $clave => $valor) {
            Configuracion::updateOrCreate(['clave' => $clave], ['valor' => $valor]);
        }

        $this->guardado = true;
    }

    public function render()
    {
        return view('livewire.admin.gestion-configuraciones')
            ->layout('layouts.admin', ['titulo' => 'Configuración']);
    }
}
