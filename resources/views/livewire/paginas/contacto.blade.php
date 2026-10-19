@use('App\Support\Marca')
@php
    $instagram = App\Models\Configuracion::obtener('instagram');
    $campo = 'block w-full rounded-none border-2 border-negro bg-transparent px-4 py-3.5 text-lg text-negro placeholder:text-negro/70 focus:border-petroleo focus:ring-0 transition-colors';
@endphp
<div>
    {{-- Escribinos y lo charlamos. --}}
    <section class="fondo-negro relative overflow-hidden">
        <div aria-hidden="true" class="absolute -right-[30vw] sm:-right-[16vw] lg:-right-40 top-1/2 -translate-y-1/2 w-[90vw] sm:w-[70vw] lg:w-[46rem] text-petroleo pointer-events-none">
            <span data-rearma class="block"><x-publica.huella class="w-full h-auto" /></span>
        </div>
        <div class="relative max-w-7xl mx-auto px-5 sm:px-8 lg:px-12 pt-24 pb-20 sm:pt-28 lg:pb-28 min-h-[80svh] flex flex-col">
            <x-publica.cabecera rotulo="¿Y vos?" />
            <x-publica.sticker data-pega color="amarillo" class="self-end mt-10 sm:mt-6 lg:mr-24 w-28 h-28 sm:w-36 sm:h-36 lg:w-40 lg:h-40 text-2xl sm:text-3xl">escribinos</x-publica.sticker>
            <div class="mt-auto pt-10 max-w-4xl">
                <x-publica.titular como="h1" :texto="$hero?->titulo ?: 'Escribinos y *lo charlamos*'" class="text-[clamp(3.4rem,min(10vw,15vh),8.6rem)]" />
                @if($hero?->subtitulo)
                    <p class="mt-6 max-w-xl text-lg sm:text-xl leading-relaxed texto-suave">{{ $hero->subtitulo }}</p>
                @endif
            </div>
        </div>
    </section>

    <section class="fondo-hueso relative">
        <div class="max-w-7xl mx-auto px-5 sm:px-8 lg:px-12 pt-20 pb-24 sm:pt-24 lg:pb-32 grid grid-cols-1 lg:grid-cols-12 gap-16 lg:gap-12">
            {{-- Por dónde escribirnos --}}
            <div class="lg:col-span-5">
                @if($whatsapp)
                    <a href="{{ Marca::whatsapp($whatsapp, 'Hola CHILO! Quiero contarles de mi marca.') }}" target="_blank" rel="noopener"
                       class="group block fondo-negro p-7 sm:p-8">
                        <span class="flex items-center justify-between gap-6">
                            <x-publica.icono nombre="whatsapp" class="w-9 h-9 text-amarillo" />
                            <x-publica.icono nombre="flecha" class="w-7 h-7 transition-transform duration-300 group-hover:translate-x-1.5" />
                        </span>
                        <span class="mt-10 block titular text-[clamp(2.4rem,5vw,3.6rem)]">Escribinos por <span class="remate">WhatsApp</span></span>
                        <span class="mt-3 block texto-suave">Te contestamos nosotros, no un bot.</span>
                    </a>
                @endif

                <ul class="mt-12 border-t-2 border-negro">
                    @if($emailContacto)
                        <li class="border-b-2 border-negro">
                            <a href="mailto:{{ $emailContacto }}" class="flex items-center gap-4 py-5 hover:text-petroleo transition-colors">
                                <x-publica.icono nombre="mail" class="w-6 h-6 shrink-0" />
                                <span class="text-lg font-semibold break-all">{{ $emailContacto }}</span>
                            </a>
                        </li>
                    @endif
                    @if($telefonoContacto)
                        <li class="border-b-2 border-negro">
                            <a href="tel:{{ preg_replace('/[^\d+]/', '', $telefonoContacto) }}" class="flex items-center gap-4 py-5 hover:text-petroleo transition-colors">
                                <x-publica.icono nombre="telefono" class="w-6 h-6 shrink-0" />
                                <span class="cifras text-lg font-semibold">{{ $telefonoContacto }}</span>
                            </a>
                        </li>
                    @endif
                    @if($instagram)
                        <li class="border-b-2 border-negro">
                            <a href="{{ $instagram }}" target="_blank" rel="noopener" class="flex items-center gap-4 py-5 hover:text-petroleo transition-colors">
                                <x-publica.icono nombre="instagram" class="w-6 h-6 shrink-0" />
                                <span class="text-lg font-semibold">{{ '@'.trim((string) parse_url($instagram, PHP_URL_PATH), '/') }} <span class="font-normal texto-suave">· también por DM</span></span>
                            </a>
                        </li>
                    @endif
                    @if($direccionContacto)
                        <li class="border-b-2 border-negro flex items-center gap-4 py-5">
                            <x-publica.icono nombre="lugar" class="w-6 h-6 shrink-0" />
                            <span class="text-lg font-semibold">{{ $direccionContacto }}</span>
                        </li>
                    @endif
                </ul>
            </div>

            {{-- Formulario --}}
            <div class="lg:col-span-7 lg:pl-8">
                @if($enviado)
                    <div class="fondo-amarillo p-8 sm:p-12" role="status">
                        <x-publica.titular texto="¡Llegó tu *mensaje!*" class="text-[clamp(2.8rem,6vw,4.8rem)]" />
                        <p class="mt-6 text-lg texto-suave max-w-md">Gracias por escribirnos. Lo leemos y te respondemos a la brevedad.</p>
                        <button type="button" wire:click="$set('enviado', false)" class="mt-8 enlace font-semibold text-lg">Enviar otro mensaje</button>
                    </div>
                @else
                    <h2 class="titular text-[clamp(2.4rem,5vw,3.6rem)]">Contanos de <span class="remate">tu marca</span></h2>

                    <form wire:submit="enviar" class="mt-10 space-y-7" novalidate>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-7">
                            <div>
                                <label for="nombre" class="rotulo block mb-2.5">Nombre <span aria-hidden="true">*</span></label>
                                <input wire:model="nombre" type="text" id="nombre" autocomplete="name" required placeholder="Cómo te llamás" class="{{ $campo }}" @error('nombre') aria-invalid="true" aria-describedby="error-nombre" @enderror>
                                @error('nombre') <p id="error-nombre" class="mt-2 inline-block bg-negro text-amarillo text-sm font-semibold px-2.5 py-1">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label for="telefono" class="rotulo block mb-2.5">Teléfono <span aria-hidden="true">*</span></label>
                                <input wire:model="telefono" type="tel" id="telefono" autocomplete="tel" required placeholder="+54 9 2324 ..." class="{{ $campo }}" @error('telefono') aria-invalid="true" aria-describedby="error-telefono" @enderror>
                                @error('telefono') <p id="error-telefono" class="mt-2 inline-block bg-negro text-amarillo text-sm font-semibold px-2.5 py-1">{{ $message }}</p> @enderror
                            </div>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-7">
                            <div>
                                <label for="email" class="rotulo block mb-2.5">Email</label>
                                <input wire:model="email" type="email" id="email" autocomplete="email" placeholder="tu@email.com" class="{{ $campo }}" @error('email') aria-invalid="true" aria-describedby="error-email" @enderror>
                                @error('email') <p id="error-email" class="mt-2 inline-block bg-negro text-amarillo text-sm font-semibold px-2.5 py-1">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label for="asunto" class="rotulo block mb-2.5">Asunto <span aria-hidden="true">*</span></label>
                                <input wire:model="asunto" type="text" id="asunto" required placeholder="Redes, fotos, video…" class="{{ $campo }}" @error('asunto') aria-invalid="true" aria-describedby="error-asunto" @enderror>
                                @error('asunto') <p id="error-asunto" class="mt-2 inline-block bg-negro text-amarillo text-sm font-semibold px-2.5 py-1">{{ $message }}</p> @enderror
                            </div>
                        </div>
                        <div>
                            <label for="mensaje" class="rotulo block mb-2.5">Mensaje <span aria-hidden="true">*</span></label>
                            <textarea wire:model="mensaje" id="mensaje" rows="5" required placeholder="Qué hacés, a quién le hablás y qué te gustaría lograr." class="{{ $campo }} resize-y" @error('mensaje') aria-invalid="true" aria-describedby="error-mensaje" @enderror></textarea>
                            @error('mensaje') <p id="error-mensaje" class="mt-2 inline-block bg-negro text-amarillo text-sm font-semibold px-2.5 py-1">{{ $message }}</p> @enderror
                        </div>
                        <div class="flex flex-wrap items-center gap-x-6 gap-y-4 pt-2">
                            <button type="submit" class="boton bg-negro text-hueso disabled:opacity-60" wire:loading.attr="disabled" wire:target="enviar">
                                <span wire:loading.remove wire:target="enviar" class="inline-flex items-center gap-3">Enviar mensaje <x-publica.icono nombre="flecha" /></span>
                                <span wire:loading wire:target="enviar">Enviando…</span>
                            </button>
                            <p class="text-sm texto-suave">* Obligatorio</p>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </section>
</div>
