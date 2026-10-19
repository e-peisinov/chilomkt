@props(['tamano' => 'chico'])
{{-- Firma "huella + CHILO mkt". Respeta el logo configurable del admin: con imagen subida usa la imagen;
     sin imagen dibuja la huella. "texto" muestra solo el nombre. --}}
@php
    $modo = \App\Models\Configuracion::obtener('logo_modo', 'ambos');
    $texto = \App\Models\Configuracion::obtener('logo_texto') ?: \App\Models\Configuracion::obtener('nombre_sitio', 'CHILO');
    $imagen = \App\Models\Configuracion::obtener('logo_imagen');
    $grande = $tamano === 'grande';
@endphp
<span {{ $attributes->merge(['class' => 'inline-flex items-center '.($grande ? 'gap-4 sm:gap-6' : 'gap-2.5')]) }}>
    @if($modo !== 'texto')
        @if($imagen)
            <img src="{{ asset('storage/'.$imagen) }}" alt="{{ $modo === 'imagen' ? $texto : '' }}" class="{{ $grande ? 'h-20 sm:h-28' : 'h-8' }} w-auto object-contain">
        @else
            <span {{ $grande ? 'data-rearma' : '' }} class="inline-block">
                <x-publica.huella ajustada class="{{ $grande ? 'w-20 h-20 sm:w-28 sm:h-28' : 'w-8 h-8' }}" :titulo="$modo === 'imagen' ? $texto : null" />
            </span>
        @endif
    @endif
    @if($modo !== 'imagen')
        <span class="relative inline-block leading-none">
            <span class="font-anton uppercase tracking-[.01em] {{ $grande ? 'text-6xl sm:text-8xl' : 'text-[1.6rem]' }}">{{ $texto }}</span>
            <span class="remate absolute right-0 {{ $grande ? '-bottom-4 sm:-bottom-6 text-2xl sm:text-4xl' : '-bottom-2 text-[.8rem]' }} -rotate-6" aria-hidden="true">mkt</span>
        </span>
    @endif
</span>
