@props(['href' => '#', 'color' => 'amarillo', 'externo' => false])
{{-- Botón de marca: rectángulo pleno con el contorno corrido; al pasar el mouse el contorno se acomoda. --}}
@php
    $colores = [
        'amarillo' => 'bg-amarillo text-negro',
        'negro' => 'bg-negro text-hueso',
        'hueso' => 'bg-hueso text-negro',
    ];
@endphp
<a href="{{ $href }}" @if($externo) target="_blank" rel="noopener" @else wire:navigate @endif
   {{ $attributes->merge(['class' => 'boton '.($colores[$color] ?? $colores['amarillo'])]) }}>{{ $slot }}</a>
