@props(['seccion' => null, 'titulo' => '¿Tu marca *se anima?*', 'bajada' => 'Escribinos y lo charlamos.', 'boton' => 'Escribinos', 'sticker' => 'escribinos', 'rotulo' => '¿Y vos?'])
{{-- Cierre de cada página (sección CTA del CMS): slide amarillo, sticker que gira y la huella que se rearma. --}}
@php
    $whatsapp = \App\Models\Configuracion::obtener('whatsapp');
    $instagram = \App\Models\Configuracion::obtener('instagram');
@endphp
<section class="fondo-amarillo relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-5 sm:px-8 lg:px-12 pt-24 pb-20 sm:pt-28 lg:pt-32 lg:pb-28">
        <x-publica.cabecera :rotulo="$rotulo" />

        <div class="relative mt-16 sm:mt-20 lg:mt-24">
            <x-publica.sticker color="negro" data-gira="140" class="absolute -top-10 right-0 sm:right-6 lg:right-16 w-28 h-28 sm:w-40 sm:h-40 lg:w-48 lg:h-48 text-xl sm:text-3xl lg:text-4xl">{{ $sticker }}</x-publica.sticker>

            <x-publica.titular :texto="$seccion?->titulo ?: $titulo" class="relative max-w-5xl text-[clamp(3.4rem,11vw,9.5rem)] pr-24 sm:pr-40" />
            <p class="mt-8 max-w-xl text-lg sm:text-xl leading-relaxed texto-suave">{{ $seccion?->subtitulo ?: $bajada }}</p>

            <div class="mt-10 flex flex-wrap items-center gap-x-8 gap-y-6">
                @if($whatsapp)
                    <x-publica.boton :href="\App\Support\Marca::whatsapp($whatsapp, 'Hola CHILO! Quiero contarles de mi marca.')" externo color="negro">
                        <x-publica.icono nombre="whatsapp" />
                        {{ $seccion?->contenido ?: $boton }} por WhatsApp
                    </x-publica.boton>
                @endif
                <a href="/contacto" wire:navigate class="enlace font-texto font-semibold text-lg">Dejanos un mensaje</a>
                @if($instagram)
                    <a href="{{ $instagram }}" target="_blank" rel="noopener" class="enlace inline-flex items-center gap-2 font-texto font-semibold text-lg">
                        <x-publica.icono nombre="instagram" /> {{ '@'.trim((string) parse_url($instagram, PHP_URL_PATH), '/') }}
                    </a>
                @endif
            </div>
        </div>

        <div class="mt-20 sm:mt-24 flex justify-start">
            <x-publica.marca tamano="grande" />
        </div>
    </div>
</section>
