@use('App\Support\Marca')
@php
    $historia = $historiaSeccion?->contenido ?: $hero?->contenido;
    $coloresValor = ['amarillo', 'petroleo', 'negro', 'amarillo'];
    $fondosMiembro = ['amarillo', 'petroleo', 'hueso'];
@endphp
<div>
    {{-- Hola: "somos dos que se animaron". --}}
    <section class="fondo-hueso relative overflow-hidden">
        <p aria-hidden="true" data-paralaje="x:-18" class="calado absolute bottom-[-4vw] left-[18%] text-[46vw] lg:text-[34rem] pointer-events-none whitespace-nowrap">Chilo</p>
        <div class="relative max-w-7xl mx-auto px-5 sm:px-8 lg:px-12 pt-24 pb-20 sm:pt-28 lg:pb-28 min-h-[92svh] flex flex-col">
            <x-publica.cabecera rotulo="Quiénes somos" />
            <x-publica.sticker data-pega class="self-end mt-10 sm:-mt-2 lg:mr-20 w-28 h-28 sm:w-36 sm:h-36 lg:w-44 lg:h-44 text-3xl sm:text-4xl lg:text-5xl">hola!</x-publica.sticker>
            <div class="mt-auto pt-10 max-w-4xl">
                <x-publica.titular como="h1" :texto="$hero?->titulo ?: 'Somos dos que se *animaron.*'" class="text-[clamp(3.4rem,min(10vw,15vh),8.6rem)]" />
                @if($hero?->subtitulo)
                    <p class="mt-6 max-w-xl text-lg sm:text-xl leading-relaxed texto-suave">{{ $hero->subtitulo }}</p>
                @endif
            </div>
        </div>
    </section>

    {{-- Por qué existimos: arrancamos de cero. --}}
    <section class="fondo-negro relative overflow-hidden">
        <div aria-hidden="true" class="absolute -right-[12vw] sm:right-0 lg:right-[6%] top-10 pointer-events-none">
            <span data-dibuja class="block font-anton leading-[.8] text-transparent text-[78vw] sm:text-[60vw] lg:text-[44rem] [-webkit-text-stroke:2px_#124D47]">0</span>
        </div>
        <div class="relative max-w-7xl mx-auto px-5 sm:px-8 lg:px-12 pt-24 pb-24 sm:pt-28 lg:pb-32">
            <x-publica.cabecera :rotulo="$historiaSeccion?->subtitulo ?: 'Por qué existimos'" />
            <span aria-hidden="true" class="block mt-24 sm:mt-32 w-24 h-1.5 bg-amarillo"></span>
            <div class="mt-10 grid grid-cols-1 lg:grid-cols-12 gap-12 items-end">
                <div class="lg:col-span-7">
                    <x-publica.titular :texto="$historiaSeccion?->titulo ?: 'Arrancamos *de cero*'" class="text-[clamp(3.4rem,10vw,8.6rem)]" />
                    @if($historia)
                        <p class="mt-8 max-w-2xl text-lg sm:text-xl leading-relaxed texto-suave">{{ $historia }}</p>
                    @endif
                    @if(count($estadisticas))
                        <ul class="mt-12 flex flex-wrap gap-x-5 gap-y-6 text-2xl sm:text-3xl" aria-label="En números">
                            @foreach($estadisticas as $i => $est)
                                <li data-pega>
                                    <x-publica.cinta :color="['amarillo', 'hueso', 'petroleo'][$i % 3]" :giro="$i % 2 ? 'der' : 'izq'">
                                        <span class="cifras">{{ $est['valor'] }}</span> {{ $est['etiqueta'] }}
                                    </x-publica.cinta>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
                @if($historiaSeccion?->imagen)
                    <div class="lg:col-span-5 visor relative p-3 text-amarillo">
                        <i></i><i></i><i></i><i></i>
                        <img src="{{ asset('storage/'.$historiaSeccion->imagen) }}" alt="El equipo de CHILO" loading="lazy" class="w-full h-72 sm:h-96 lg:h-[450px] object-cover">
                    </div>
                @endif
            </div>
        </div>
    </section>

    {{-- Misión y visión. --}}
    @if($mision?->contenido || $vision?->contenido)
        <section class="fondo-petroleo relative">
            <div class="max-w-7xl mx-auto px-5 sm:px-8 lg:px-12 pt-24 pb-24 sm:pt-28 lg:pb-32">
                <x-publica.cabecera rotulo="Hacia dónde vamos" />
                <div class="mt-20 sm:mt-24 grid grid-cols-1 md:grid-cols-2 gap-14 md:gap-0">
                    @foreach([$mision, $vision] as $i => $bloque)
                        @if($bloque?->contenido)
                            <div data-entra class="{{ $i === 1 ? 'md:pl-12 lg:pl-16 md:border-l-2 md:border-hueso/20' : 'md:pr-12 lg:pr-16' }}">
                                <h2 class="remate text-5xl sm:text-6xl -rotate-3">{{ $bloque->titulo }}</h2>
                                <p class="mt-8 font-anton uppercase text-[clamp(1.9rem,3.4vw,3rem)] leading-[1.05]">{{ $bloque->contenido }}</p>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Valores: por qué una huella. --}}
    @if(count($valores))
        <section class="fondo-hueso relative overflow-hidden">
            <div aria-hidden="true" class="hidden sm:block absolute -right-24 top-44 sm:right-[-6rem] lg:right-[-4rem] w-[26rem] sm:w-[34rem] lg:w-[40rem] text-petroleo pointer-events-none">
                <span data-rearma class="block"><x-publica.huella class="w-full h-auto" /></span>
            </div>
            <div class="relative max-w-7xl mx-auto px-5 sm:px-8 lg:px-12 pt-24 pb-24 sm:pt-28 lg:pb-32">
                <x-publica.cabecera rotulo="Lo que nos define" />
                <div class="mt-24 sm:mt-32 max-w-3xl">
                    <x-publica.titular :texto="$valoresSeccion?->titulo ?: '¿Por qué *una huella?*'" class="text-[clamp(3.2rem,9vw,8rem)]" />
                    @if($valoresSeccion?->subtitulo)
                        <p class="mt-7 max-w-xl text-lg sm:text-xl leading-relaxed texto-suave">{{ $valoresSeccion->subtitulo }}</p>
                    @endif
                </div>
                <ul class="mt-16 grid grid-cols-1 sm:grid-cols-2 gap-x-12 gap-y-14 max-w-4xl">
                    @foreach($valores as $i => $valor)
                        <li class="{{ $i % 2 ? 'sm:mt-16' : '' }}">
                            <div data-pega class="text-3xl sm:text-4xl">
                                <x-publica.cinta :color="$coloresValor[$i % 4]" :giro="$i % 2 ? 'der' : 'izq'">{{ $valor['titulo'] }}</x-publica.cinta>
                            </div>
                            <p class="mt-6 max-w-sm text-lg leading-relaxed texto-suave">{{ $valor['descripcion'] }}</p>
                        </li>
                    @endforeach
                </ul>
            </div>
        </section>
    @endif

    {{-- Equipo --}}
    @if($miembros->count())
        <section class="fondo-negro relative">
            <div class="max-w-7xl mx-auto px-5 sm:px-8 lg:px-12 pt-24 pb-24 sm:pt-28 lg:pb-32">
                <x-publica.cabecera rotulo="El equipo" />
                <div class="mt-24 sm:mt-32 max-w-4xl">
                    <x-publica.titular :texto="$equipoIntro?->titulo ?: 'Las caras *detrás de CHILO*'" class="text-[clamp(3.2rem,9vw,8rem)]" />
                    @if($equipoIntro?->subtitulo)
                        <p class="mt-7 max-w-xl text-lg sm:text-xl leading-relaxed texto-suave">{{ $equipoIntro->subtitulo }}</p>
                    @endif
                </div>
                <ul data-feed class="mt-16 grid grid-cols-1 sm:grid-cols-2 gap-x-8 gap-y-14 {{ $miembros->count() > 2 ? 'lg:grid-cols-3' : 'max-w-5xl' }}">
                    @foreach($miembros as $i => $miembro)
                        <li>
                            <div class="fondo-{{ $fondosMiembro[$i % 3] }} relative aspect-[4/5] overflow-hidden">
                                @if($miembro->foto)
                                    <img src="{{ asset('storage/'.$miembro->foto) }}" alt="{{ $miembro->nombre }}" loading="lazy" class="absolute inset-0 w-full h-full object-cover">
                                @else
                                    <span aria-hidden="true" class="calado absolute -bottom-[6%] -right-[4%] text-[18rem] sm:text-[20rem]">{{ mb_substr($miembro->nombre, 0, 1) }}</span>
                                    <span aria-hidden="true" class="absolute left-6 top-6 text-[color:var(--trazo)]"><x-publica.huella ajustada class="w-12 h-12" /></span>
                                @endif
                            </div>
                            <h3 class="mt-6 titular text-4xl">{{ $miembro->nombre }}</h3>
                            <p class="remate text-2xl mt-1 -rotate-2">{{ $miembro->cargo }}</p>
                            @if($miembro->bio)
                                <p class="mt-4 max-w-sm leading-relaxed texto-suave">{{ $miembro->bio }}</p>
                            @endif
                            @if($miembro->instagram || $miembro->linkedin)
                                <div class="mt-5 flex gap-3">
                                    @foreach(['instagram' => $miembro->instagram, 'linkedin' => $miembro->linkedin] as $red => $url)
                                        @if($url)
                                            <a href="{{ $url }}" target="_blank" rel="noopener" aria-label="{{ ucfirst($red) }} de {{ $miembro->nombre }}"
                                               class="w-11 h-11 flex items-center justify-center border-2 border-hueso/25 hover:border-amarillo hover:text-amarillo transition-colors">
                                                <x-publica.icono :nombre="$red" />
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
        </section>
    @endif

    <x-publica.cierre :seccion="$ctaSeccion" titulo="¿Laburamos *juntos?*" bajada="Contanos de tu marca y vemos cómo ayudarte." sticker="hola!" />
</div>
