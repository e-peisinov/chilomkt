<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="theme-color" content="#121212">

        <title>{{ $titulo ?? 'CHILO · Estudio de marketing y contenido en Mercedes' }}</title>
        <meta name="description" content="{{ $metaDescripcion ?? 'CHILO es un estudio de marketing y contenido de Mercedes, Buenos Aires. Estrategia, manejo de redes, producción audiovisual con drone y diseño para que tu negocio se vea, se elija y crezca.' }}">

        {{-- Las escenas fijadas se preparan antes del primer cuadro (publica.js las vuelve a poner al navegar). --}}
        <script>
            if (! matchMedia('(prefers-reduced-motion: reduce)').matches && ! new URLSearchParams(location.search).has('captura')) {
                document.documentElement.classList.add('movimiento');
            }
        </script>

        @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/publica.js'])
    </head>
    <body class="sitio font-texto bg-negro text-hueso antialiased">
        @php
            $links = [
                ['href' => '/', 'label' => 'Inicio', 'active' => request()->is('/')],
                ['href' => '/nosotros', 'label' => 'Nosotros', 'active' => request()->is('nosotros')],
                ['href' => '/servicios', 'label' => 'Servicios', 'active' => request()->is('servicios')],
                ['href' => '/contacto', 'label' => 'Contacto', 'active' => request()->is('contacto')],
            ];
            $whatsapp = App\Models\Configuracion::obtener('whatsapp');
            $instagram = App\Models\Configuracion::obtener('instagram');
            $facebook = App\Models\Configuracion::obtener('facebook');
            $linkedin = App\Models\Configuracion::obtener('linkedin');
            $email = App\Models\Configuracion::obtener('email');
            $telefono = App\Models\Configuracion::obtener('telefono');
            $direccion = App\Models\Configuracion::obtener('direccion');
        @endphp

        <a href="#contenido" class="sr-only focus:not-sr-only focus:fixed focus:top-3 focus:left-3 focus:z-[60] focus:bg-amarillo focus:text-negro focus:px-4 focus:py-2 font-semibold">Saltar al contenido</a>

        {{-- Barra: siempre negra (los slides cambian de fondo debajo). Se esconde al bajar y vuelve al subir. --}}
        <header data-barra
                x-data="{ abierto: false, oculta: false, ultimo: 0 }"
                x-init="window.addEventListener('scroll', () => { const y = window.scrollY; oculta = y > 120 && y > ultimo && ! abierto; ultimo = y; }, { passive: true })"
                :class="oculta ? '-translate-y-full' : 'translate-y-0'"
                class="fixed inset-x-0 top-0 z-50 fondo-negro transition-transform duration-500 ease-[cubic-bezier(.16,1,.3,1)]">
            <div class="max-w-7xl mx-auto px-5 sm:px-8 lg:px-12 h-16 flex items-center justify-between gap-6">
                <a href="/" wire:navigate aria-label="CHILO, ir al inicio" class="shrink-0">
                    <x-publica.marca />
                </a>

                <nav class="hidden md:flex items-center gap-8" aria-label="Principal">
                    @foreach($links as $link)
                        <a href="{{ $link['href'] }}" wire:navigate @if($link['active']) aria-current="page" @endif
                           class="rotulo py-2 transition-colors {{ $link['active'] ? 'text-amarillo' : 'text-hueso/80 hover:text-hueso' }}">{{ $link['label'] }}</a>
                    @endforeach
                    @auth
                        <a href="/admin" wire:navigate class="rotulo py-2 text-hueso/60 hover:text-hueso transition-colors">Configuraciones</a>
                    @endauth
                    @if($whatsapp)
                        <a href="{{ App\Support\Marca::whatsapp($whatsapp) }}" target="_blank" rel="noopener"
                           class="inline-flex items-center gap-2 bg-amarillo text-negro font-anton uppercase tracking-wider text-sm px-4 py-2.5 hover:bg-hueso transition-colors">
                            <x-publica.icono nombre="whatsapp" class="w-4 h-4" /> Escribinos
                        </a>
                    @endif
                </nav>

                <button type="button" class="md:hidden -mr-2 p-2 text-hueso" :aria-expanded="abierto" aria-controls="menu-movil"
                        @click="abierto = ! abierto; window.chilo?.frenarScroll(abierto)">
                    <span class="sr-only" x-text="abierto ? 'Cerrar menú' : 'Abrir menú'">Abrir menú</span>
                    <svg class="w-7 h-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="square" aria-hidden="true">
                        <path x-show="! abierto" d="M3 7h18M3 12h18M3 17h12"/>
                        <path x-show="abierto" x-cloak d="M5 5l14 14M19 5L5 19"/>
                    </svg>
                </button>
            </div>

            {{-- Menú móvil: un slide negro a pantalla completa. --}}
            <div id="menu-movil" x-show="abierto" x-cloak
                 x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                 x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                 @keydown.escape.window="abierto = false; window.chilo?.frenarScroll(false)"
                 class="md:hidden fixed inset-x-0 top-16 bottom-0 fondo-negro overflow-y-auto" data-lenis-prevent>
                <div class="px-5 pt-8 pb-12 flex flex-col min-h-full">
                    <p class="rotulo texto-suave">Menú</p>
                    <nav class="mt-6 flex flex-col gap-1" aria-label="Principal móvil">
                        @foreach($links as $link)
                            <a href="{{ $link['href'] }}" wire:navigate @click="abierto = false; window.chilo?.frenarScroll(false)" @if($link['active']) aria-current="page" @endif
                               class="titular text-6xl py-1 {{ $link['active'] ? 'text-amarillo' : '' }}">{{ $link['label'] }}</a>
                        @endforeach
                        @auth
                            <a href="/admin" wire:navigate class="rotulo mt-6 py-2 texto-suave">Configuraciones</a>
                        @endauth
                    </nav>
                    <div class="mt-auto pt-10 flex flex-col gap-4">
                        @if($whatsapp)
                            <a href="{{ App\Support\Marca::whatsapp($whatsapp) }}" target="_blank" rel="noopener"
                               class="inline-flex items-center justify-center gap-2 bg-amarillo text-negro font-anton uppercase tracking-wider text-lg px-5 py-4">
                                <x-publica.icono nombre="whatsapp" /> Escribinos por WhatsApp
                            </a>
                        @endif
                        @if($instagram)
                            <a href="{{ $instagram }}" target="_blank" rel="noopener" class="inline-flex items-center gap-2 font-semibold texto-suave">
                                <x-publica.icono nombre="instagram" /> {{ '@'.trim((string) parse_url($instagram, PHP_URL_PATH), '/') }}
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </header>

        <main id="contenido">
            {{ $slot }}
        </main>

        {{-- WhatsApp siempre a mano. --}}
        @if($whatsapp)
            <a href="{{ App\Support\Marca::whatsapp($whatsapp) }}" target="_blank" rel="noopener" aria-label="Escribinos por WhatsApp"
               class="fixed bottom-5 right-5 sm:bottom-7 sm:right-7 z-40 w-14 h-14 rounded-full bg-negro text-amarillo ring-2 ring-amarillo flex items-center justify-center hover:bg-amarillo hover:text-negro transition-colors">
                <x-publica.icono nombre="whatsapp" class="w-7 h-7" />
            </a>
        @endif

        <footer class="fondo-negro relative overflow-hidden">
            <div class="max-w-7xl mx-auto px-5 sm:px-8 lg:px-12 pt-20 pb-10">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-12 gap-12">
                    <div class="lg:col-span-5">
                        <x-publica.marca />
                        <p class="mt-6 max-w-sm texto-suave leading-relaxed">{{ App\Models\Configuracion::obtener('slogan', 'Estudio de marketing y contenido') }}. Ayudamos a que los negocios se vean, se elijan y crezcan.</p>
                    </div>
                    <nav class="lg:col-span-3" aria-label="Pie">
                        <p class="rotulo text-amarillo">Páginas</p>
                        <ul class="mt-5 space-y-3">
                            @foreach($links as $link)
                                <li><a href="{{ $link['href'] }}" wire:navigate class="texto-suave hover:text-hueso transition-colors">{{ $link['label'] }}</a></li>
                            @endforeach
                        </ul>
                    </nav>
                    <div class="lg:col-span-4">
                        <p class="rotulo text-amarillo">Contacto</p>
                        <ul class="mt-5 space-y-3 texto-suave">
                            @if($email)<li><a href="mailto:{{ $email }}" class="hover:text-hueso transition-colors break-all">{{ $email }}</a></li>@endif
                            @if($telefono)<li><a href="tel:{{ preg_replace('/[^\d+]/', '', $telefono) }}" class="cifras hover:text-hueso transition-colors">{{ $telefono }}</a></li>@endif
                            @if($direccion)<li>{{ $direccion }}</li>@endif
                        </ul>
                        <div class="mt-6 flex items-center gap-3">
                            @foreach(['instagram' => $instagram, 'facebook' => $facebook, 'linkedin' => $linkedin] as $red => $url)
                                @if($url)
                                    <a href="{{ $url }}" target="_blank" rel="noopener" aria-label="{{ ucfirst($red) }}"
                                       class="w-11 h-11 flex items-center justify-center border-2 border-hueso/25 text-hueso hover:border-amarillo hover:text-amarillo transition-colors">
                                        <x-publica.icono :nombre="$red" />
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="mt-20 -mx-2 overflow-hidden" aria-hidden="true">
                    <p data-paralaje="x:-12" class="calado whitespace-nowrap text-[22vw] lg:text-[15rem]">CHILO MKT · CHILO MKT</p>
                </div>

                <div class="mt-10 pt-6 border-t border-hueso/15 flex flex-col sm:flex-row justify-between gap-2 text-sm texto-suave">
                    <p>&copy; {{ date('Y') }} CHILO. Mercedes, Buenos Aires.</p>
                    <p>Método antes que improvisación.</p>
                </div>
            </div>
        </footer>
    </body>
</html>
