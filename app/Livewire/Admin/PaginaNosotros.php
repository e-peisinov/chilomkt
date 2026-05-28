<?php

namespace App\Livewire\Admin;

use App\Models\MiembroEquipo;
use App\Models\Seccion;
use Livewire\Component;
use Livewire\WithFileUploads;

class PaginaNosotros extends Component
{
    use WithFileUploads;

    public $seccionActiva = '';
    public $secciones = [];
    public $estadisticas = [];
    public $valores = [];

    public $historiaImagen;

    // MiembroEquipo CRUD
    public $mostrarModalMiembro = false;
    public $miembroId = null;
    public $miembroNombre = '';
    public $miembroCargo = '';
    public $miembroBio = '';
    public $miembroFoto;
    public $miembroLinkedin = '';
    public $miembroInstagram = '';
    public $miembroOrden = 0;
    public $miembroActivo = true;

    // Flash
    public $mensaje = '';
    public $tipoMensaje = '';

    public function mount()
    {
        $claves = [
            'nosotros_hero',
            'nosotros_historia',
            'nosotros_estadisticas',
            'mision',
            'vision',
            'nosotros_valores',
            'nosotros_equipo_intro',
            'nosotros_cta',
        ];

        foreach ($claves as $clave) {
            $seccion = Seccion::obtener($clave);

            $this->secciones[$clave] = [
                'titulo' => $seccion->titulo ?? '',
                'subtitulo' => $seccion->subtitulo ?? '',
                'contenido' => $seccion->contenido ?? '',
                'imagen' => $seccion->imagen ?? '',
            ];
        }

        // Decodificar estadisticas
        $contenidoEstadisticas = $this->secciones['nosotros_estadisticas']['contenido'];
        $this->estadisticas = $contenidoEstadisticas ? json_decode($contenidoEstadisticas, true) ?? [] : [];

        // Decodificar valores
        $contenidoValores = $this->secciones['nosotros_valores']['contenido'];
        $this->valores = $contenidoValores ? json_decode($contenidoValores, true) ?? [] : [];
    }

    public function toggleSeccion($nombre)
    {
        $this->seccionActiva = $this->seccionActiva === $nombre ? '' : $nombre;
    }

    public function guardarSeccion($clave)
    {
        $datos = $this->secciones[$clave];

        // Para estadisticas y valores, guardar como JSON
        if ($clave === 'nosotros_estadisticas') {
            $datos['contenido'] = json_encode($this->estadisticas);
        }

        if ($clave === 'nosotros_valores') {
            $datos['contenido'] = json_encode($this->valores);
        }

        // Determinar pagina
        $seccionExistente = Seccion::where('clave', $clave)->first();
        $pagina = $seccionExistente ? $seccionExistente->pagina : 'nosotros';

        Seccion::updateOrCreate(
            ['clave' => $clave],
            [
                'pagina' => $pagina,
                'titulo' => $datos['titulo'],
                'subtitulo' => $datos['subtitulo'],
                'contenido' => $datos['contenido'],
            ]
        );

        $this->mensaje = 'Seccion guardada correctamente.';
        $this->tipoMensaje = 'exito';
    }

    public function guardarHistoria()
    {
        // Guardar imagen de historia si se subio
        if ($this->historiaImagen && !is_string($this->historiaImagen)) {
            $ruta = $this->historiaImagen->store('secciones', 'public');
            $seccion = Seccion::where('clave', 'nosotros_historia')->first();
            if ($seccion) {
                $seccion->update(['imagen' => $ruta]);
            }
            $this->secciones['nosotros_historia']['imagen'] = $ruta;
            $this->historiaImagen = null;
        }

        $this->guardarSeccion('nosotros_historia');
        $this->guardarSeccion('nosotros_hero');
        $this->mensaje = 'Historia guardada correctamente.';
        $this->tipoMensaje = 'exito';
    }

    // Estadisticas
    public function agregarEstadistica()
    {
        $this->estadisticas[] = ['valor' => '', 'etiqueta' => ''];
    }

    public function eliminarEstadistica($index)
    {
        unset($this->estadisticas[$index]);
        $this->estadisticas = array_values($this->estadisticas);
    }

    // Valores
    public function agregarValor()
    {
        $this->valores[] = ['icono' => '', 'titulo' => '', 'descripcion' => ''];
    }

    public function eliminarValor($index)
    {
        unset($this->valores[$index]);
        $this->valores = array_values($this->valores);
    }

    // MiembroEquipo CRUD
    public function crearMiembro()
    {
        $this->resetMiembro();
        $this->mostrarModalMiembro = true;
    }

    public function editarMiembro($id)
    {
        $miembro = MiembroEquipo::findOrFail($id);

        $this->miembroId = $miembro->id;
        $this->miembroNombre = $miembro->nombre;
        $this->miembroCargo = $miembro->cargo;
        $this->miembroBio = $miembro->bio;
        $this->miembroLinkedin = $miembro->linkedin;
        $this->miembroInstagram = $miembro->instagram;
        $this->miembroOrden = $miembro->orden;
        $this->miembroActivo = $miembro->activo;
        $this->miembroFoto = null;

        $this->mostrarModalMiembro = true;
    }

    public function guardarMiembro()
    {
        $datos = [
            'nombre' => $this->miembroNombre,
            'cargo' => $this->miembroCargo,
            'bio' => $this->miembroBio,
            'linkedin' => $this->miembroLinkedin,
            'instagram' => $this->miembroInstagram,
            'orden' => $this->miembroOrden,
            'activo' => $this->miembroActivo,
        ];

        if ($this->miembroFoto) {
            $datos['foto'] = $this->miembroFoto->store('equipo', 'public');
        }

        if ($this->miembroId) {
            $miembro = MiembroEquipo::findOrFail($this->miembroId);
            $miembro->update($datos);
            $this->mensaje = 'Miembro actualizado correctamente.';
        } else {
            MiembroEquipo::create($datos);
            $this->mensaje = 'Miembro creado correctamente.';
        }

        $this->tipoMensaje = 'exito';
        $this->mostrarModalMiembro = false;
        $this->resetMiembro();
    }

    public function eliminarMiembro($id)
    {
        MiembroEquipo::findOrFail($id)->delete();
        $this->mensaje = 'Miembro eliminado correctamente.';
        $this->tipoMensaje = 'exito';
    }

    private function resetMiembro()
    {
        $this->miembroId = null;
        $this->miembroNombre = '';
        $this->miembroCargo = '';
        $this->miembroBio = '';
        $this->miembroFoto = null;
        $this->miembroLinkedin = '';
        $this->miembroInstagram = '';
        $this->miembroOrden = 0;
        $this->miembroActivo = true;
    }

    public function render()
    {
        return view('livewire.admin.pagina-nosotros', [
            'miembros' => MiembroEquipo::orderBy('orden')->get(),
        ])->layout('layouts.admin', ['titulo' => 'Pagina Nosotros']);
    }
}
