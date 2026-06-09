<?php

namespace App\Livewire\Admin;

use App\Livewire\Concerns\ValidaImagen;
use App\Models\Seccion;
use App\Models\Servicio;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class PaginaServicios extends Component
{
    use WithFileUploads, ValidaImagen;

    public string $seccionActiva = '';

    public array $secciones = [];

    // CRUD Servicio
    public bool $mostrarModalServicio = false;
    public $servicioId = null;
    public string $servicioTitulo = '';
    public string $servicioDescripcion = '';
    public string $servicioIcono = '';
    public $servicioImagen = null;
    public int $servicioOrden = 0;
    public bool $servicioActivo = true;

    // Flash
    public string $mensaje = '';
    public string $tipoMensaje = '';

    public function mount(): void
    {
        $claves = ['servicios_hero', 'servicios_cta'];

        foreach ($claves as $clave) {
            $seccion = Seccion::obtener($clave);

            $this->secciones[$clave] = [
                'titulo' => $seccion->titulo ?? '',
                'subtitulo' => $seccion->subtitulo ?? '',
                'contenido' => $seccion->contenido ?? '',
            ];
        }
    }

    public function toggleSeccion(string $nombre): void
    {
        $this->seccionActiva = $this->seccionActiva === $nombre ? '' : $nombre;
    }

    public function guardarSeccion(string $clave): void
    {
        $datos = $this->secciones[$clave] ?? [];

        Seccion::updateOrCreate(
            ['clave' => $clave],
            [
                'pagina' => 'servicios',
                'titulo' => $datos['titulo'] ?? '',
                'subtitulo' => $datos['subtitulo'] ?? '',
                'contenido' => $datos['contenido'] ?? '',
            ]
        );

        $this->mensaje = 'Sección guardada correctamente.';
        $this->tipoMensaje = 'exito';
    }

    // CRUD Servicio

    public function crearServicio(): void
    {
        $this->reset([
            'servicioId',
            'servicioTitulo',
            'servicioDescripcion',
            'servicioIcono',
            'servicioImagen',
            'servicioOrden',
            'servicioActivo',
        ]);

        $this->servicioOrden = Servicio::max('orden') + 1;
        $this->servicioActivo = true;
        $this->mostrarModalServicio = true;
    }

    public function editarServicio(int $id): void
    {
        $servicio = Servicio::findOrFail($id);

        $this->servicioId = $servicio->id;
        $this->servicioTitulo = $servicio->titulo;
        $this->servicioDescripcion = $servicio->descripcion;
        $this->servicioIcono = $servicio->icono ?? '';
        $this->servicioImagen = null;
        $this->servicioOrden = $servicio->orden;
        $this->servicioActivo = $servicio->activo;
        $this->mostrarModalServicio = true;
    }

    public function guardarServicio(): void
    {
        $reglas = [
            'servicioTitulo' => 'required|min:2|max:100',
            'servicioDescripcion' => 'required|min:10',
            'servicioIcono' => 'nullable|max:50',
            'servicioImagen' => $this->reglaImagen(),
            'servicioOrden' => 'integer|min:0',
        ];

        $this->validate($reglas);

        $datos = [
            'titulo' => $this->servicioTitulo,
            'descripcion' => $this->servicioDescripcion,
            'icono' => $this->servicioIcono,
            'orden' => $this->servicioOrden,
            'activo' => $this->servicioActivo,
        ];

        if ($this->servicioImagen) {
            $datos['imagen'] = $this->servicioImagen->store('servicios', 'public');
        }

        if ($this->servicioId) {
            $servicio = Servicio::findOrFail($this->servicioId);
            $servicio->update($datos);
            $this->mensaje = 'Servicio actualizado correctamente.';
        } else {
            Servicio::create($datos);
            $this->mensaje = 'Servicio creado correctamente.';
        }

        $this->tipoMensaje = 'exito';
        $this->mostrarModalServicio = false;
    }

    public function quitarServicioImagen(): void
    {
        if ($this->servicioId) {
            $servicio = Servicio::findOrFail($this->servicioId);
            if ($servicio->imagen) {
                Storage::disk('public')->delete($servicio->imagen);
                $servicio->update(['imagen' => null]);
            }
        }
        $this->servicioImagen = null;
    }

    public function eliminarServicio(int $id): void
    {
        Servicio::findOrFail($id)->delete();

        $this->mensaje = 'Servicio eliminado correctamente.';
        $this->tipoMensaje = 'exito';
    }

    public function render()
    {
        return view('livewire.admin.pagina-servicios', [
            'servicios' => Servicio::orderBy('orden')->get(),
        ])->layout('layouts.admin', ['titulo' => 'Página Servicios']);
    }
}
