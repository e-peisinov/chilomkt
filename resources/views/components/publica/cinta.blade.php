@props(['color' => 'negro', 'giro' => 'izq'])
{{-- Etiqueta inclinada con el contorno corrido. El giro va en el envoltorio para que el contorno quede detrás. --}}
@php
    $colores = [
        'negro' => 'bg-negro text-hueso',
        'hueso' => 'bg-hueso text-negro',
        'amarillo' => 'bg-amarillo text-negro',
        'petroleo' => 'bg-petroleo text-hueso',
    ];
    $giros = ['izq' => '-rotate-2', 'der' => 'rotate-2', 'no' => ''];
@endphp
<span {{ $attributes->merge(['class' => 'inline-block '.($giros[$giro] ?? '')]) }}>
    <span class="cinta {{ $colores[$color] ?? $colores['negro'] }}">{{ $slot }}</span>
</span>
