@props(['rotulo' => ''])
{{-- Cabecera de slide como en los carruseles: rótulo arriba a la izquierda, huella chica a la derecha. --}}
<div {{ $attributes->merge(['class' => 'flex items-center justify-between gap-6']) }}>
    <p class="rotulo">{{ $rotulo }}</p>
    <x-publica.huella ajustada class="w-7 h-7 shrink-0" />
</div>
