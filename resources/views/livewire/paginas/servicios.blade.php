@use('App\Support\Marca')
@php
    $tipos = ['estrategia', 'redes', 'audiovisual', 'diseno'];
    $fondos = ['estrategia' => 'hueso', 'redes' => 'negro', 'audiovisual' => 'petroleo', 'diseno' => 'negro'];
    $coloresCinta = ['hueso', 'petroleo', 'negro', 'hueso'];
    $n = $servicios->count();
@endphp
<div>
    {{-- Qué ofrecemos --}}
    <section class="fondo-amarillo relative overflow-hidden">
        <div aria-hidden="true" class="absolute -right-20 top-24 sm:right-0 lg:right-10 w-[22rem] sm:w-[28rem] lg:w-[34rem] pointer-events-none" data-paralaje="y:-25">
            <svg viewBox="0 0 100 100" class="w-full" fill="none" stroke="var(--calado)" stroke-width=".6">
                <path d="M36 4h28v32h32v28H64v32H36V64H4V36h32z"/>
            </svg>
        </div>
        <div class="relative max-w-7xl mx-auto px-5 sm:px-8 lg:px-12 pt-24 pb-20 sm:pt-28 lg:pb-28 min-h-[88svh] flex flex-col">
            <x-publica.cabecera rotulo="Qué ofrecemos" />
            <div class="mt-auto pt-24 max-w-4xl">
                <x-publica.titular como="h1" :texto="$heroSeccion?->titulo ?: 'Lo que hacemos *por tu marca*'" class="text-[clamp(3.4rem,min(10vw,15vh),8.6rem)]" />
                @if($heroSeccion?->subtitulo)
                    <p class="mt-6 max-w-xl text-lg sm:text-xl leading-relaxed texto-suave">{{ $heroSeccion->subtitulo }}</p>
                @endif
                <ul class="mt-10 flex flex-wrap gap-x-5 gap-y-6 text-xl sm:text-2xl lg:text-3xl" aria-label="Servicios">
                    @foreach($servicios as $i => $servicio)
                        <li data-pega>
                            <a href="#servicio-{{ $servicio->id }}"><x-publica.cinta :color="$coloresCinta[$i % 4]" :giro="$i % 2 ? 'der' : 'izq'">{{ $servicio->titulo }}</x-publica.cinta></a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>

    {{-- Subir contenido es fácil... --}}
    @if($heroSeccion?->contenido)
        <section class="fondo-negro relative overflow-hidden">
            <div class="max-w-7xl mx-auto px-5 sm:px-8 lg:px-12 py-24 sm:py-32">
                <x-publica.titular :texto="$heroSeccion->contenido" class="max-w-5xl text-[clamp(2.8rem,7.5vw,6.8rem)]" />
            </div>
        </section>
    @endif

    {{-- Un slide por servicio. --}}
    @foreach($servicios as $i => $servicio)
        @php
            [$titularServicio, $textoServicio] = Marca::partir($servicio->descripcion);
            $tipo = in_array($servicio->icono, $tipos, true) ? $servicio->icono : $tipos[$i % 4];
        @endphp
        <section id="servicio-{{ $servicio->id }}" class="fondo-{{ $fondos[$tipo] }} relative scroll-mt-16">
            <div class="max-w-7xl mx-auto px-5 sm:px-8 lg:px-12 pt-24 pb-10 sm:pt-28 min-h-svh flex flex-col">
                <x-publica.cabecera :rotulo="$servicio->titulo" />
                <div class="flex-1 grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-16 items-center py-14">
                    <div class="lg:col-span-5 {{ $i % 2 ? '' : 'lg:order-2' }} w-[62%] sm:w-[48%] lg:w-full max-w-md {{ $i % 2 ? '' : 'ml-auto' }}">
                        @if($servicio->imagen)
                            <div class="visor relative aspect-square p-3 text-[color:var(--trazo)]">
                                <i></i><i></i><i></i><i></i>
                                <img src="{{ asset('storage/'.$servicio->imagen) }}" alt="{{ $servicio->titulo }}" loading="lazy" class="w-full h-full object-cover">
                            </div>
                        @else
                            <x-publica.pictograma :tipo="$tipo" />
                        @endif
                    </div>
                    <div data-entra class="lg:col-span-7 {{ $i % 2 ? '' : 'lg:order-1' }}">
                        <h2 class="sr-only">{{ $servicio->titulo }}</h2>
                        <x-publica.titular como="p" :texto="$titularServicio ?: $servicio->titulo" class="text-[clamp(2.8rem,7vw,6.4rem)]" />
                        @if($textoServicio)
                            <p class="mt-7 max-w-lg text-lg sm:text-xl leading-relaxed texto-suave">{{ $textoServicio }}</p>
                        @endif
                    </div>
                </div>
                <div class="flex items-center justify-between gap-4 text-sm">
                    <span class="cifras font-semibold texto-suave">{{ $i + 1 }}/{{ $n }}</span>
                    <span class="rotulo texto-suave inline-flex items-center gap-2">@if($i + 1 < $n) Deslizá <x-publica.icono nombre="abajo" class="w-4 h-4" /> @else ¿Arrancamos? @endif</span>
                </div>
            </div>
        </section>
    @endforeach

    <x-publica.cierre :seccion="$ctaSeccion" titulo="¿Arrancamos?" bajada="Escribinos, contanos de tu marca y te armamos una propuesta." sticker="dale" />
</div>
