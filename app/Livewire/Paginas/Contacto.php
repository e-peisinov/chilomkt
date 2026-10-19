<?php

namespace App\Livewire\Paginas;

use App\Models\Configuracion;
use App\Models\MensajeContacto;
use App\Models\Seccion;
use Livewire\Component;

class Contacto extends Component
{
    public string $nombre = '';
    public string $email = '';
    public string $telefono = '';
    public string $asunto = '';
    public string $mensaje = '';
    public bool $enviado = false;

    protected function rules()
    {
        return [
            'nombre' => 'required|min:2|max:100',
            'email' => 'nullable|email|max:100',
            'telefono' => 'required|max:30',
            'asunto' => 'required|min:3|max:150',
            'mensaje' => 'required|min:10|max:2000',
        ];
    }

    protected function messages()
    {
        return [
            'nombre.required' => 'Contanos cómo te llamás.',
            'nombre.min' => 'El nombre es muy corto.',
            'telefono.required' => 'Dejanos un teléfono para responderte.',
            'email.email' => 'Revisá el email: parece que le falta algo.',
            'asunto.required' => 'Poné un asunto, aunque sea corto.',
            'asunto.min' => 'El asunto es muy corto.',
            'mensaje.required' => 'Contanos un poco de tu marca.',
            'mensaje.min' => 'Contanos un poco más (al menos 10 caracteres).',
            '*.max' => 'Es demasiado largo.',
        ];
    }

    public function enviar()
    {
        $this->validate();

        MensajeContacto::create([
            'nombre' => $this->nombre,
            'email' => $this->email,
            'telefono' => $this->telefono,
            'asunto' => $this->asunto,
            'mensaje' => $this->mensaje,
        ]);

        $this->reset(['nombre', 'email', 'telefono', 'asunto', 'mensaje']);
        $this->enviado = true;
    }

    public function render()
    {
        return view('livewire.paginas.contacto', [
            'hero' => Seccion::obtener('contacto_hero'),
            'emailContacto' => Configuracion::obtener('email'),
            'telefonoContacto' => Configuracion::obtener('telefono'),
            'direccionContacto' => Configuracion::obtener('direccion'),
            'whatsapp' => Configuracion::obtener('whatsapp'),
        ])->layout('layouts.publica', ['titulo' => 'Contacto · CHILO']);
    }
}
