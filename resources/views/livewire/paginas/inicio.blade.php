@use('App\Support\Marca')
@php
    $whatsapp = App\Models\Configuracion::obtener('whatsapp');
    // Cada servicio toma la gráfica y el fondo de su slide en Instagram.
    $tipos = ['estrategia', 'redes', 'audiovisual', 'diseno'];
    $fondos = ['estrategia' => 'hueso', 'redes' => 'negro', 'audiovisual' => 'petroleo', 'diseno' => 'negro'];
    $coloresCinta = ['hueso', 'petroleo', 'negro', 'hueso'];
    $n = $servicios->count();
    // Slides de la página para el contador del hero: hero, qué hacemos, servicios, método, trabajos y cierre.
    $slides = 3 + ($n ? 1 : 0) + (count($pasos) ? 1 : 0) + ($clientes->count() ? 1 : 0);
@endphp
<div>
    {{-- Hero: la cámara entra por la huella hasta el punto amarillo. --}}
    <section data-escena="huella" class="fondo-negro relative">
        <div data-escenario class="relative min-h-svh overflow-hidden flex flex-col">
            <div data-huella class="absolute pointer-events-none text-petroleo aspect-square
                        w-[135vw] -mt-[67.5vw] top-[34%] left-[18vw]
                        sm:w-[96vw] sm:-mt-[48vw] sm:top-[42%] sm:left-[34vw]
                        lg:w-[min(112vh,80vw)] lg:-mt-[min(56vh,40vw)] lg:top-1/2 lg:left-[47vw]">
                <x-publica.huella class="w-full h-full" />
            </div>

            <div class="relative z-10 flex-1 flex flex-col max-w-7xl w-full mx-auto px-5 sm:px-8 lg:px-12 pt-24 sm:pt-28 pb-8">

                <div class="mt-auto pt-16 max-w-4xl">
                    <x-publica.titular como="h1" :texto="$hero?->titulo ?: 'Que tu negocio se vea, se elija *y crezca.*'"
                                       data-hero-sale class="text-[clamp(3rem,min(8.4vw,12.5vh),7.6rem)]" />
                    @if($hero?->subtitulo)
                        <p data-hero-sale class="mt-6 max-w-xl text-lg lg:text-xl leading-relaxed texto-suave">{{ $hero->subtitulo }}</p>
                    @endif
                    <div data-hero-sale class="mt-9 flex flex-wrap items-center gap-x-8 gap-y-5">
                        @if($whatsapp)
                            <x-publica.boton :href="Marca::whatsapp($whatsapp, 'Hola CHILO! Quiero contarles de mi marca.')" externo>
                                <x-publica.icono nombre="whatsapp" /> Escribinos por WhatsApp
                            </x-publica.boton>
                        @else
                            <x-publica.boton href="/contacto">Escribinos <x-publica.icono nombre="flecha" /></x-publica.boton>
                        @endif
                        <a href="#que-hacemos" class="enlace font-semibold text-lg">Ver qué hacemos</a>
                    </div>
                </div>

                <div data-hero-fijo class="mt-10 pt-5 border-t border-hueso/15 flex flex-wrap items-end justify-between gap-x-10 gap-y-4">
                    @if(count($estadisticas))
                        <ul class="flex flex-wrap gap-x-8 gap-y-3">
                            @foreach($estadisticas as $est)
                                <li class="flex items-baseline gap-2.5">
                                    <span class="font-anton text-2xl text-amarillo cifras">{{ $est['valor'] }}</span>
                                    <span class="texto-suave text-sm">{{ $est['etiqueta'] }}</span>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                    <p class="rotulo texto-suave inline-flex items-center gap-3"><span class="cifras">1/{{ $slides }}</span> Deslizá <x-publica.icono nombre="abajo" class="w-4 h-4" /></p>
                </div>
            </div>
        </div>
    </section>

    {{-- Qué hacemos: el punto amarillo del hero se vuelve este fondo. --}}
    <section id="que-hacemos" class="fondo-amarillo relative overflow-hidden">
        <div aria-hidden="true" class="absolute -right-16 top-24 sm:right-0 lg:right-10 w-[22rem] sm:w-[28rem] lg:w-[34rem] pointer-events-none" data-paralaje="y:-25">
            <svg viewBox="0 0 100 100" class="w-full" fill="none" stroke="var(--calado)" stroke-width=".6">
                <path d="M36 4h28v32h32v28H64v32H36V64H4V36h32z"/>
            </svg>
        </div>
        <div class="relative max-w-7xl mx-auto px-5 sm:px-8 lg:px-12 pt-24 pb-24 sm:pt-28 lg:pb-32">
            <x-publica.cabecera rotulo="Qué ofrecemos" />
            <div class="mt-16 sm:mt-24 lg:mt-28 max-w-4xl">
                <x-publica.titular :texto="$serviciosIntro?->titulo ?: 'Lo que hacemos *por tu marca*'" class="text-[clamp(3.2rem,9vw,8rem)]" />
                @if($serviciosIntro?->subtitulo)
                    <p class="mt-7 max-w-xl text-lg sm:text-xl leading-relaxed texto-suave">{{ $serviciosIntro->subtitulo }}</p>
                @endif
            </div>
            <ul class="mt-12 flex flex-wrap gap-x-5 gap-y-6 text-xl sm:text-2xl lg:text-3xl" aria-label="Servicios">
                @foreach($servicios as $i => $servicio)
                    <li data-pega><x-publica.cinta :color="$coloresCinta[$i % 4]" :giro="$i % 2 ? 'der' : 'izq'">{{ $servicio->titulo }}</x-publica.cinta></li>
                @endforeach
            </ul>
        </div>
    </section>

    {{-- Servicios como carrusel: con movimiento la pista se desliza en horizontal; sin él, slides apilados. --}}
    @if($n)
        <section data-escena="carrusel" style="--n: {{ $n }}" class="relative bg-negro" aria-label="Servicios">
            <div data-escenario class="relative">
                <div data-pista class="flex flex-col">
                    @foreach($servicios as $i => $servicio)
                        @php
                            [$titularServicio, $textoServicio] = Marca::partir($servicio->descripcion);
                            $tipo = in_array($servicio->icono, $tipos, true) ? $servicio->icono : $tipos[$i % 4];
                        @endphp
                        <article data-slide class="fondo-{{ $fondos[$tipo] }} relative min-h-svh flex flex-col">
                            <div class="flex-1 flex flex-col max-w-7xl w-full mx-auto px-5 sm:px-8 lg:px-12 pt-24 pb-8">
                                <x-publica.cabecera :rotulo="$servicio->titulo" />
                                <div class="flex-1 grid grid-cols-1 lg:grid-cols-12 gap-6 lg:gap-12 content-center items-center py-6">
                                    <div class="lg:col-span-5 lg:order-2 w-[44%] sm:w-[40%] lg:w-full max-w-sm lg:max-w-md ml-auto">
                                        @if($servicio->imagen)
                                            <div class="visor relative aspect-square p-3 text-[color:var(--trazo)]">
                                                <i></i><i></i><i></i><i></i>
                                                <img src="{{ asset('storage/'.$servicio->imagen) }}" alt="{{ $servicio->titulo }}" loading="lazy" class="w-full h-full object-cover">
                                            </div>
                                        @else
                                            <x-publica.pictograma :tipo="$tipo" />
                                        @endif
                                    </div>
                                    <div data-slide-texto class="lg:col-span-7 lg:order-1">
                                        <x-publica.titular como="h3" :texto="$titularServicio ?: $servicio->titulo" class="text-[clamp(2.6rem,6.6vw,6.2rem)]" />
                                        @if($textoServicio)
                                            <p class="mt-6 max-w-lg text-lg sm:text-xl leading-relaxed texto-suave">{{ $textoServicio }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="flex items-center justify-between gap-4 text-sm">
                                    <span class="cifras font-semibold texto-suave">{{ $i + 1 }}/{{ $n }}</span>
                                    <span class="flex gap-1.5" aria-hidden="true">
                                        @for($j = 0; $j < $n; $j++)
                                            <span class="w-2 h-2 rounded-full border border-current {{ $j === $i ? 'bg-current' : 'opacity-50' }}"></span>
                                        @endfor
                                    </span>
                                    <span class="rotulo texto-suave inline-flex items-center gap-2">@if($i + 1 < $n) Deslizá <x-publica.icono nombre="flecha" class="w-4 h-4" /> @else ¿Arrancamos? @endif</span>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Cintas de texto que corren con el scroll. --}}
    @php $frase = $servicios->pluck('titulo')->push('Foto')->push('Video')->push('Drone')->map(fn ($t) => mb_strtoupper($t))->join(' · '); @endphp
    <section class="fondo-negro py-14 sm:py-20 overflow-hidden" aria-hidden="true">
        <p data-cinta="-1" class="titular whitespace-nowrap text-[clamp(3rem,9vw,8rem)] text-amarillo">{{ $frase }} · {{ $frase }}</p>
        <p data-cinta="1" class="calado whitespace-nowrap text-[clamp(3rem,9vw,8rem)] mt-2 -ml-[30%]">{{ $frase }} · {{ $frase }}</p>
    </section>

    {{-- Método --}}
    @if(count($pasos))
        <section id="metodo" class="fondo-hueso relative overflow-hidden">
            <p aria-hidden="true" data-paralaje="x:-14" class="calado absolute -top-6 right-0 translate-x-[18%] text-[42vw] lg:text-[30rem] pointer-events-none">Plan</p>
            <div class="relative max-w-7xl mx-auto px-5 sm:px-8 lg:px-12 pt-24 pb-24 sm:pt-28 lg:pb-32">
                <x-publica.cabecera rotulo="Cómo trabajamos" />
                <div class="mt-24 sm:mt-32 grid grid-cols-1 lg:grid-cols-12 gap-12 items-end">
                    <div class="{{ $procesoSeccion?->imagen ? 'lg:col-span-7' : 'lg:col-span-10' }}">
                        <x-publica.titular :texto="$procesoSeccion?->titulo ?: 'Método antes que *improvisación*'" class="text-[clamp(3rem,8vw,7rem)]" />
                        @if($procesoSeccion?->subtitulo)
                            <p class="mt-7 max-w-xl text-lg sm:text-xl leading-relaxed texto-suave">{{ $procesoSeccion->subtitulo }}</p>
                        @endif
                    </div>
                    @if($procesoSeccion?->imagen)
                        <div class="lg:col-span-5 visor relative p-3 text-petroleo">
                            <i></i><i></i><i></i><i></i>
                            <img src="{{ asset('storage/'.$procesoSeccion->imagen) }}" alt="{{ strip_tags(str_replace('*', '', $procesoSeccion->titulo)) }}" loading="lazy" class="w-full h-72 sm:h-96 object-cover">
                        </div>
                    @endif
                </div>

                <ol class="mt-16 border-t-2 border-negro">
                    @foreach($pasos as $paso)
                        <li data-metodo-fila class="relative grid grid-cols-1 sm:grid-cols-12 gap-x-8 gap-y-3 items-center py-7 sm:py-9">
                            <span data-regla aria-hidden="true" class="absolute inset-x-0 bottom-0 h-0.5 bg-negro"></span>
                            <h3 data-paso class="sm:col-span-6 titular text-[clamp(2.6rem,6.4vw,5.6rem)]">{{ $paso['titulo'] }}</h3>
                            <p class="sm:col-span-6 sm:text-right text-lg leading-relaxed texto-suave [&_.remate]:block [&_.remate]:text-[2rem] sm:[&_.remate]:text-[2.6rem] [&_.remate]:mb-2 [&_.remate]:-rotate-3">{{ Marca::remate($paso['descripcion'] ?? '') }}</p>
                        </li>
                    @endforeach
                </ol>
            </div>
        </section>
    @endif

    {{-- Trabajos: base del futuro portfolio, sobre los clientes del CMS. --}}
    @if($clientes->count())
        @php $fondosFeed = ['amarillo', 'petroleo', 'hueso']; @endphp
        <section id="trabajos" class="fondo-negro relative">
            <div class="max-w-7xl mx-auto px-5 sm:px-8 lg:px-12 pt-24 pb-24 sm:pt-28 lg:pb-32">
                <x-publica.cabecera rotulo="Trabajos" />
                <div class="mt-24 sm:mt-32 max-w-4xl">
                    <x-publica.titular :texto="$clientesIntro?->titulo ?: 'Marcas que *se animaron*'" class="text-[clamp(3rem,8vw,7rem)]" />
                    @if($clientesIntro?->subtitulo)
                        <p class="mt-7 max-w-xl text-lg sm:text-xl leading-relaxed texto-suave">{{ $clientesIntro->subtitulo }}</p>
                    @endif
                </div>
                <ul data-feed class="mt-14 grid grid-cols-2 lg:grid-cols-3 gap-1.5 sm:gap-2">
                    @foreach($clientes as $i => $cliente)
                        <li class="fondo-{{ $fondosFeed[($i + intdiv($i, 3)) % 3] }} relative aspect-square overflow-hidden group">
                            @if($cliente->logo)
                                <img src="{{ asset('storage/'.$cliente->logo) }}" alt="{{ $cliente->nombre }}" loading="lazy" class="absolute inset-0 w-full h-full object-contain p-[18%]">
                            @else
                                <p class="absolute inset-0 flex items-center justify-center p-5 text-center titular text-[clamp(1.6rem,4.4vw,3.4rem)]">{{ $cliente->nombre }}</p>
                            @endif
                            @if($cliente->descripcion)
                                <p class="absolute left-3 bottom-3 right-3 sm:left-5 sm:bottom-5 text-xs sm:text-sm font-semibold texto-suave">{{ $cliente->descripcion }}</p>
                            @endif
                            @if($cliente->sitio_web)
                                <a href="{{ $cliente->sitio_web }}" target="_blank" rel="noopener" class="absolute inset-0" aria-label="Ver {{ $cliente->nombre }}">
                                    <span class="absolute top-3 right-3 sm:top-5 sm:right-5 opacity-0 group-hover:opacity-100 group-focus-within:opacity-100 transition-opacity"><x-publica.icono nombre="flecha" class="w-6 h-6 -rotate-45" /></span>
                                </a>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
        </section>
    @endif

    <x-publica.cierre :seccion="$ctaSeccion" />
</div>
