<?php

namespace App\Livewire\Admin;

use App\Models\Configuracion;
use App\Models\MensajeContacto;
use App\Models\Seccion;
use Livewire\Component;
use Livewire\WithPagination;

class PaginaContacto extends Component
{
    use WithPagination;

    public string $seccionActiva = '';

    public array $secciones = [];

    public string $configEmail = '';
    public string $configTelefono = '';
    public string $configDireccion = '';
    public string $configWhatsapp = '';

    public string $mensaje = '';
    public string $tipoMensaje = '';

    public function mount(): void
    {
        $s = Seccion::obtener('contacto_hero');
        $this->secciones['contacto_hero'] = [
            'titulo' => $s?->titulo ?? '',
            'subtitulo' => $s?->subtitulo ?? '',
            'contenido' => $s?->contenido ?? '',
        ];

        $this->configEmail = Configuracion::obtener('email') ?? '';
        $this->configTelefono = Configuracion::obtener('telefono') ?? '';
        $this->configDireccion = Configuracion::obtener('direccion') ?? '';
        $this->configWhatsapp = Configuracion::obtener('whatsapp') ?? '';
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
                'pagina' => 'contacto',
                'titulo' => $datos['titulo'] ?? '',
                'subtitulo' => $datos['subtitulo'] ?? '',
                'contenido' => $datos['contenido'] ?? '',
            ]
        );

        $this->mensaje = 'Seccion guardada correctamente.';
        $this->tipoMensaje = 'exito';
    }

    public function guardarConfigContacto(): void
    {
        Configuracion::updateOrCreate(['clave' => 'email'], ['valor' => $this->configEmail]);
        Configuracion::updateOrCreate(['clave' => 'telefono'], ['valor' => $this->configTelefono]);
        Configuracion::updateOrCreate(['clave' => 'direccion'], ['valor' => $this->configDireccion]);
        Configuracion::updateOrCreate(['clave' => 'whatsapp'], ['valor' => $this->configWhatsapp]);

        $this->mensaje = 'Datos de contacto guardados correctamente.';
        $this->tipoMensaje = 'exito';
    }

    public function marcarLeido(int $id): void
    {
        $mensajeContacto = MensajeContacto::findOrFail($id);
        $mensajeContacto->update(['leido' => !$mensajeContacto->leido]);

        $this->mensaje = 'Estado del mensaje actualizado.';
        $this->tipoMensaje = 'exito';
    }

    public function eliminarMensaje(int $id): void
    {
        MensajeContacto::findOrFail($id)->delete();

        $this->mensaje = 'Mensaje eliminado correctamente.';
        $this->tipoMensaje = 'exito';
    }

    public function render()
    {
        return view('livewire.admin.pagina-contacto', [
            'mensajes' => MensajeContacto::latest()->paginate(10),
        ])->layout('layouts.admin', ['titulo' => 'Pagina Contacto']);
    }
}
