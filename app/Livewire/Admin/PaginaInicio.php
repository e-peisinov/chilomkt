<?php

namespace App\Livewire\Admin;

use App\Models\Cliente;
use App\Models\Seccion;
use App\Models\Servicio;
use App\Models\Testimonio;
use Livewire\Component;
use Livewire\WithFileUploads;

class PaginaInicio extends Component
{
    use WithFileUploads;

    public string $seccionActiva = '';
    public array $secciones = [];
    public array $estadisticas = [];
    public array $pasos = [];

    public $heroImagen = null;
    public $procesoImagen = null;

    public string $mensaje = '';
    public string $tipoMensaje = '';

    // Servicio CRUD
    public bool $mostrarModalServicio = false;
    public $servicioId = null;
    public string $servicioTitulo = '';
    public string $servicioDescripcion = '';
    public string $servicioIcono = '';
    public $servicioImagen = null;
    public int $servicioOrden = 0;
    public bool $servicioActivo = true;

    // Cliente CRUD
    public bool $mostrarModalCliente = false;
    public $clienteId = null;
    public string $clienteNombre = '';
    public $clienteLogo = null;
    public string $clienteSitioWeb = '';
    public string $clienteDescripcion = '';
    public int $clienteOrden = 0;
    public bool $clienteActivo = true;

    // Testimonio CRUD
    public bool $mostrarModalTestimonio = false;
    public $testimonioId = null;
    public string $testimonioNombre = '';
    public string $testimonioCargo = '';
    public string $testimonioEmpresa = '';
    public string $testimonioContenido = '';
    public $testimonioFoto = null;
    public int $testimonioOrden = 0;
    public bool $testimonioActivo = true;

    public function mount(): void
    {
        $claves = [
            'hero',
            'inicio_estadisticas',
            'servicios_intro',
            'clientes_intro',
            'inicio_proceso',
            'inicio_testimonios',
            'inicio_cta',
        ];

        foreach ($claves as $clave) {
            $s = Seccion::obtener($clave);
            $this->secciones[$clave] = [
                'titulo' => $s?->titulo ?? '',
                'subtitulo' => $s?->subtitulo ?? '',
                'contenido' => $s?->contenido ?? '',
                'imagen' => $s?->imagen ?? '',
            ];
        }

        // Cargar estadisticas desde JSON
        $contenidoEstadisticas = $this->secciones['inicio_estadisticas']['contenido'];
        $this->estadisticas = is_string($contenidoEstadisticas) && !empty($contenidoEstadisticas)
            ? json_decode($contenidoEstadisticas, true) ?? []
            : [];

        // Cargar pasos desde JSON
        $contenidoPasos = $this->secciones['inicio_proceso']['contenido'];
        $this->pasos = is_string($contenidoPasos) && !empty($contenidoPasos)
            ? json_decode($contenidoPasos, true) ?? []
            : [];
    }

    public function toggleSeccion(string $nombre): void
    {
        $this->seccionActiva = $this->seccionActiva === $nombre ? '' : $nombre;
    }

    public function guardarSeccion(string $clave): void
    {
        $seccionExistente = Seccion::where('clave', $clave)->first();

        $datos = [
            'pagina' => $seccionExistente?->pagina ?? 'home',
            'titulo' => $this->secciones[$clave]['titulo'],
            'subtitulo' => $this->secciones[$clave]['subtitulo'],
            'contenido' => $this->secciones[$clave]['contenido'],
        ];

        if ($clave === 'inicio_estadisticas') {
            $datos['contenido'] = json_encode($this->estadisticas);
        }

        if ($clave === 'inicio_proceso') {
            $datos['contenido'] = json_encode($this->pasos);
            if ($this->procesoImagen && !is_string($this->procesoImagen)) {
                $datos['imagen'] = $this->procesoImagen->store('secciones', 'public');
                $this->procesoImagen = null;
            }
        }

        if ($clave === 'hero') {
            if ($this->heroImagen && !is_string($this->heroImagen)) {
                $datos['imagen'] = $this->heroImagen->store('secciones', 'public');
                $this->heroImagen = null;
            }
        }

        Seccion::updateOrCreate(['clave' => $clave], $datos);

        $this->secciones[$clave]['imagen'] = Seccion::obtener($clave)?->imagen ?? '';

        $this->mensaje = 'Seccion guardada correctamente.';
        $this->tipoMensaje = 'exito';
    }

    // --- Estadisticas ---

    public function agregarEstadistica(): void
    {
        $this->estadisticas[] = ['valor' => '', 'etiqueta' => ''];
    }

    public function eliminarEstadistica(int $index): void
    {
        unset($this->estadisticas[$index]);
        $this->estadisticas = array_values($this->estadisticas);
    }

    // --- Pasos del Proceso ---

    public function agregarPaso(): void
    {
        $this->pasos[] = ['num' => '', 'titulo' => '', 'descripcion' => ''];
    }

    public function eliminarPaso(int $index): void
    {
        unset($this->pasos[$index]);
        $this->pasos = array_values($this->pasos);
    }

    // --- Servicio CRUD ---

    public function crearServicio(): void
    {
        $this->resetServicio();
        $this->mostrarModalServicio = true;
    }

    public function editarServicio(int $id): void
    {
        $servicio = Servicio::findOrFail($id);
        $this->servicioId = $servicio->id;
        $this->servicioTitulo = $servicio->titulo ?? '';
        $this->servicioDescripcion = $servicio->descripcion ?? '';
        $this->servicioIcono = $servicio->icono ?? '';
        $this->servicioImagen = null;
        $this->servicioOrden = $servicio->orden ?? 0;
        $this->servicioActivo = (bool) $servicio->activo;
        $this->mostrarModalServicio = true;
    }

    public function guardarServicio(): void
    {
        $datos = [
            'titulo' => $this->servicioTitulo,
            'descripcion' => $this->servicioDescripcion,
            'icono' => $this->servicioIcono,
            'orden' => $this->servicioOrden,
            'activo' => $this->servicioActivo,
        ];

        if ($this->servicioImagen && !is_string($this->servicioImagen)) {
            $datos['imagen'] = $this->servicioImagen->store('servicios', 'public');
        }

        if ($this->servicioId) {
            Servicio::findOrFail($this->servicioId)->update($datos);
            $this->mensaje = 'Servicio actualizado correctamente.';
        } else {
            Servicio::create($datos);
            $this->mensaje = 'Servicio creado correctamente.';
        }

        $this->tipoMensaje = 'exito';
        $this->mostrarModalServicio = false;
        $this->resetServicio();
    }

    public function eliminarServicio(int $id): void
    {
        Servicio::findOrFail($id)->delete();
        $this->mensaje = 'Servicio eliminado correctamente.';
        $this->tipoMensaje = 'exito';
    }

    private function resetServicio(): void
    {
        $this->servicioId = null;
        $this->servicioTitulo = '';
        $this->servicioDescripcion = '';
        $this->servicioIcono = '';
        $this->servicioImagen = null;
        $this->servicioOrden = 0;
        $this->servicioActivo = true;
    }

    // --- Cliente CRUD ---

    public function crearCliente(): void
    {
        $this->resetCliente();
        $this->mostrarModalCliente = true;
    }

    public function editarCliente(int $id): void
    {
        $cliente = Cliente::findOrFail($id);
        $this->clienteId = $cliente->id;
        $this->clienteNombre = $cliente->nombre ?? '';
        $this->clienteLogo = null;
        $this->clienteSitioWeb = $cliente->sitio_web ?? '';
        $this->clienteDescripcion = $cliente->descripcion ?? '';
        $this->clienteOrden = $cliente->orden ?? 0;
        $this->clienteActivo = (bool) $cliente->activo;
        $this->mostrarModalCliente = true;
    }

    public function guardarCliente(): void
    {
        $datos = [
            'nombre' => $this->clienteNombre,
            'sitio_web' => $this->clienteSitioWeb,
            'descripcion' => $this->clienteDescripcion,
            'orden' => $this->clienteOrden,
            'activo' => $this->clienteActivo,
        ];

        if ($this->clienteLogo && !is_string($this->clienteLogo)) {
            $datos['logo'] = $this->clienteLogo->store('clientes', 'public');
        }

        if ($this->clienteId) {
            Cliente::findOrFail($this->clienteId)->update($datos);
            $this->mensaje = 'Cliente actualizado correctamente.';
        } else {
            Cliente::create($datos);
            $this->mensaje = 'Cliente creado correctamente.';
        }

        $this->tipoMensaje = 'exito';
        $this->mostrarModalCliente = false;
        $this->resetCliente();
    }

    public function eliminarCliente(int $id): void
    {
        Cliente::findOrFail($id)->delete();
        $this->mensaje = 'Cliente eliminado correctamente.';
        $this->tipoMensaje = 'exito';
    }

    private function resetCliente(): void
    {
        $this->clienteId = null;
        $this->clienteNombre = '';
        $this->clienteLogo = null;
        $this->clienteSitioWeb = '';
        $this->clienteDescripcion = '';
        $this->clienteOrden = 0;
        $this->clienteActivo = true;
    }

    // --- Testimonio CRUD ---

    public function crearTestimonio(): void
    {
        $this->resetTestimonio();
        $this->mostrarModalTestimonio = true;
    }

    public function editarTestimonio(int $id): void
    {
        $testimonio = Testimonio::findOrFail($id);
        $this->testimonioId = $testimonio->id;
        $this->testimonioNombre = $testimonio->nombre ?? '';
        $this->testimonioCargo = $testimonio->cargo ?? '';
        $this->testimonioEmpresa = $testimonio->empresa ?? '';
        $this->testimonioContenido = $testimonio->contenido ?? '';
        $this->testimonioFoto = null;
        $this->testimonioOrden = $testimonio->orden ?? 0;
        $this->testimonioActivo = (bool) $testimonio->activo;
        $this->mostrarModalTestimonio = true;
    }

    public function guardarTestimonio(): void
    {
        $datos = [
            'nombre' => $this->testimonioNombre,
            'cargo' => $this->testimonioCargo,
            'empresa' => $this->testimonioEmpresa,
            'contenido' => $this->testimonioContenido,
            'orden' => $this->testimonioOrden,
            'activo' => $this->testimonioActivo,
        ];

        if ($this->testimonioFoto && !is_string($this->testimonioFoto)) {
            $datos['foto'] = $this->testimonioFoto->store('testimonios', 'public');
        }

        if ($this->testimonioId) {
            Testimonio::findOrFail($this->testimonioId)->update($datos);
            $this->mensaje = 'Testimonio actualizado correctamente.';
        } else {
            Testimonio::create($datos);
            $this->mensaje = 'Testimonio creado correctamente.';
        }

        $this->tipoMensaje = 'exito';
        $this->mostrarModalTestimonio = false;
        $this->resetTestimonio();
    }

    public function eliminarTestimonio(int $id): void
    {
        Testimonio::findOrFail($id)->delete();
        $this->mensaje = 'Testimonio eliminado correctamente.';
        $this->tipoMensaje = 'exito';
    }

    private function resetTestimonio(): void
    {
        $this->testimonioId = null;
        $this->testimonioNombre = '';
        $this->testimonioCargo = '';
        $this->testimonioEmpresa = '';
        $this->testimonioContenido = '';
        $this->testimonioFoto = null;
        $this->testimonioOrden = 0;
        $this->testimonioActivo = true;
    }

    // --- Render ---

    public function render()
    {
        return view('livewire.admin.pagina-inicio', [
            'servicios' => Servicio::orderBy('orden')->get(),
            'clientes' => Cliente::orderBy('orden')->get(),
            'testimonios' => Testimonio::orderBy('orden')->get(),
        ])->layout('layouts.admin', ['titulo' => 'Pagina de Inicio']);
    }
}
