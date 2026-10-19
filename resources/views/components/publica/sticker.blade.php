@props(['color' => 'amarillo'])
{{-- Círculo con texto manuscrito ("hola!", "escribinos", "dale"). --}}
@php
    $colores = [
        'amarillo' => 'bg-amarillo text-negro',
        'negro' => 'bg-negro text-amarillo',
        'petroleo' => 'bg-petroleo text-amarillo',
    ];
@endphp
<span aria-hidden="true" {{ $attributes->merge(['class' => 'inline-flex items-center justify-center rounded-full font-pincel leading-none select-none '.($colores[$color] ?? $colores['amarillo'])]) }}>
    <span class="-rotate-12">{{ $slot }}</span>
</span>
