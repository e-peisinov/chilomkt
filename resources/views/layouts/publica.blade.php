<!DOCTYPE html>
<html lang="es" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $titulo ?? 'ChiloMkt - Marketing Digital & Mentalidad' }}</title>
        <meta name="description" content="{{ $metaDescripcion ?? 'Agencia de Marketing Digital & Mentalidad. Estrategia, hábitos y crecimiento real para tu negocio.' }}">

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700,800,900&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased bg-white text-gray-800 overflow-x-hidden" style="font-family: 'Inter', sans-serif;">
        @php
            $logoModo = App\Models\Configuracion::obtener('logo_modo', 'ambos');
            $logoTexto = App\Models\Configuracion::obtener('logo_texto') ?: App\Models\Configuracion::obtener('nombre_sitio', 'ChiloMkt');
            $logoImagen = App\Models\Configuracion::obtener('logo_imagen');
        @endphp
        {{-- Navbar --}}
        <nav x-data="{ scrolled: false, open: false }"
             x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 20 })"
             :class="scrolled ? 'bg-white/90 backdrop-blur-lg shadow-lg' : 'bg-transparent'"
             class="fixed top-0 left-0 right-0 z-50 transition-all duration-500">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-20 items-center">
                    <a href="/" class="group flex items-center gap-2">
                        @if($logoModo !== 'texto')
                            @if($logoImagen)
                                <img src="{{ asset('storage/' . $logoImagen) }}" alt="{{ $logoTexto }}" class="h-10 w-auto object-contain group-hover:scale-110 transition-transform duration-300">
                            @else
                                <div class="w-10 h-10 bg-gradient-to-br from-chilo-dark to-chilo rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                    <span class="text-white font-black text-lg">{{ mb_substr($logoTexto, 0, 1) }}</span>
                                </div>
                            @endif
                        @endif
                        @if($logoModo !== 'imagen')
                            <span :class="scrolled ? 'text-chilo-dark' : 'text-white'" class="text-xl font-bold transition-colors duration-300">{{ $logoTexto }}</span>
                        @endif
                    </a>

                    {{-- Mobile menu button --}}
                    <button @click="open = !open" class="md:hidden p-2 rounded-lg" :class="scrolled ? 'text-gray-600' : 'text-white'">
                        <svg x-show="!open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                        <svg x-show="open" x-cloak class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>

                    {{-- Desktop menu --}}
                    <div class="hidden md:flex items-center space-x-1">
                        @php
                            $links = [
                                ['href' => '/', 'label' => 'Inicio', 'active' => request()->is('/')],
                                ['href' => '/nosotros', 'label' => 'Nosotros', 'active' => request()->is('nosotros')],
                                ['href' => '/servicios', 'label' => 'Servicios', 'active' => request()->is('servicios')],
                            ];
                        @endphp
                        @foreach($links as $link)
                            <a href="{{ $link['href'] }}"
                               wire:navigate
                               :class="scrolled ? '{{ $link['active'] ? 'text-chilo-dark bg-chilo-light/20' : 'text-gray-600 hover:text-chilo-dark hover:bg-gray-100' }}' : '{{ $link['active'] ? 'text-white bg-white/20' : 'text-white/80 hover:text-white hover:bg-white/10' }}'"
                               class="px-4 py-2 rounded-lg font-medium transition-all duration-300 text-sm">
                                {{ $link['label'] }}
                            </a>
                        @endforeach
                        <a href="/contacto"
                           wire:navigate
                           class="ml-4 bg-gradient-to-r from-chilo-dark to-chilo text-white px-6 py-2.5 rounded-xl font-semibold hover:shadow-lg hover:shadow-chilo-dark/30 hover:-translate-y-0.5 transition-all duration-300 text-sm">
                            Hablemos
                        </a>
                        @if(auth()->check())
                        <a href="/admin"
                           wire:navigate
                           :class="scrolled ? 'text-gray-600 hover:text-chilo-dark hover:bg-gray-100' : 'text-white/80 hover:text-white hover:bg-white/10'"
                            class="px-4 py-2 rounded-lg font-medium transition-all duration-300 text-sm">
                            Configuraciones
                        </a>
                        @endif
                    </div>
                </div>

                {{-- Mobile menu --}}
                <div x-show="open" x-cloak
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 -translate-y-4"
                     x-transition:enter-end="opacity-100 translate-y-0"
                     x-transition:leave="transition ease-in duration-150"
                     x-transition:leave-start="opacity-100 translate-y-0"
                     x-transition:leave-end="opacity-0 -translate-y-4"
                     class="md:hidden pb-4 space-y-1 bg-white rounded-2xl shadow-xl p-4 mb-4">
                    @foreach($links as $link)
                        <a href="{{ $link['href'] }}" wire:navigate class="block px-4 py-3 rounded-xl text-gray-700 hover:bg-chilo-light/20 hover:text-chilo-dark font-medium transition-colors">{{ $link['label'] }}</a>
                    @endforeach
                    <a href="/contacto" wire:navigate class="block text-center bg-gradient-to-r from-chilo-dark to-chilo text-white px-4 py-3 rounded-xl font-semibold mt-2">Hablemos</a>
                    @if(auth()->check())
                        <a href="/admin" wire:navigate class="block px-4 py-3 rounded-xl text-gray-700 hover:bg-chilo-light/20 hover:text-chilo-dark font-medium transition-colors">Configuraciones</a>
                    @endif
                </div>
            </div>
        </nav>

        {{-- Page Content --}}
        <main>
            {{ $slot }}
        </main>

        {{-- WhatsApp floating button --}}
        @if($wa = App\Models\Configuracion::obtener('whatsapp'))
            <a href="https://wa.me/{{ $wa }}" target="_blank"
               class="fixed bottom-6 right-6 z-40 w-14 h-14 bg-green-500 rounded-full flex items-center justify-center shadow-lg shadow-green-500/30 hover:scale-110 hover:shadow-xl hover:shadow-green-500/40 transition-all duration-300 animate-pulse-glow"
               style="--tw-shadow-color: rgba(34, 197, 94, 0.3);">
                <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
            </a>
        @endif

        {{-- Footer --}}
        <footer class="bg-gradient-to-br from-gray-900 via-chilo-dark to-gray-900 text-white relative overflow-hidden">
            {{-- Decorative elements --}}
            <div class="absolute top-0 left-0 w-72 h-72 bg-chilo/10 rounded-full -translate-x-1/2 -translate-y-1/2 blur-3xl"></div>
            <div class="absolute bottom-0 right-0 w-96 h-96 bg-chilo-light/10 rounded-full translate-x-1/3 translate-y-1/3 blur-3xl"></div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 relative">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-10">
                    <div class="md:col-span-1">
                        <div class="flex items-center gap-2 mb-4">
                            @if($logoModo !== 'texto')
                                @if($logoImagen)
                                    <img src="{{ asset('storage/' . $logoImagen) }}" alt="{{ $logoTexto }}" class="h-10 w-auto object-contain">
                                @else
                                    <div class="w-10 h-10 bg-gradient-to-br from-chilo to-chilo-light rounded-xl flex items-center justify-center">
                                        <span class="text-white font-black text-lg">{{ mb_substr($logoTexto, 0, 1) }}</span>
                                    </div>
                                @endif
                            @endif
                            @if($logoModo !== 'imagen')
                                <span class="text-xl font-bold">{{ $logoTexto }}</span>
                            @endif
                        </div>
                        <p class="text-gray-400 text-sm leading-relaxed">Marketing Digital & Mentalidad. Estrategia, hábitos y crecimiento real para tu negocio.</p>
                    </div>
                    <div>
                        <h4 class="font-semibold mb-4 text-sm uppercase tracking-wider text-chilo-light">Páginas</h4>
                        <ul class="space-y-3">
                            <li><a href="/" wire:navigate class="text-gray-400 hover:text-white transition-colors text-sm">Inicio</a></li>
                            <li><a href="/nosotros" wire:navigate class="text-gray-400 hover:text-white transition-colors text-sm">Nosotros</a></li>
                            <li><a href="/servicios" wire:navigate class="text-gray-400 hover:text-white transition-colors text-sm">Servicios</a></li>
                            <li><a href="/contacto" wire:navigate class="text-gray-400 hover:text-white transition-colors text-sm">Contacto</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="font-semibold mb-4 text-sm uppercase tracking-wider text-chilo-light">Servicios</h4>
                        <ul class="space-y-3">
                            <li><span class="text-gray-400 text-sm">Redes Sociales</span></li>
                            <li><span class="text-gray-400 text-sm">Publicidad Digital</span></li>
                            <li><span class="text-gray-400 text-sm">Diseño Web</span></li>
                            <li><span class="text-gray-400 text-sm">Branding</span></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="font-semibold mb-4 text-sm uppercase tracking-wider text-chilo-light">Contacto</h4>
                        <ul class="space-y-3 text-gray-400 text-sm">
                            <li>{{ App\Models\Configuracion::obtener('email', 'hola@chilomkt.com') }}</li>
                            <li>{{ App\Models\Configuracion::obtener('telefono') }}</li>
                            <li>{{ App\Models\Configuracion::obtener('direccion') }}</li>
                        </ul>
                        <div class="flex space-x-3 mt-5">
                            @if($ig = App\Models\Configuracion::obtener('instagram'))
                                <a href="{{ $ig }}" target="_blank" class="w-10 h-10 bg-white/10 rounded-xl flex items-center justify-center text-gray-400 hover:bg-gradient-to-br hover:from-purple-500 hover:to-pink-500 hover:text-white transition-all duration-300">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                                </a>
                            @endif
                            @if($fb = App\Models\Configuracion::obtener('facebook'))
                                <a href="{{ $fb }}" target="_blank" class="w-10 h-10 bg-white/10 rounded-xl flex items-center justify-center text-gray-400 hover:bg-blue-600 hover:text-white transition-all duration-300">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385h-3.047v-3.47h3.047v-2.642c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953h-1.514c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385c5.738-.9 10.126-5.864 10.126-11.854z"/></svg>
                                </a>
                            @endif
                            @if($li = App\Models\Configuracion::obtener('linkedin'))
                                <a href="{{ $li }}" target="_blank" class="w-10 h-10 bg-white/10 rounded-xl flex items-center justify-center text-gray-400 hover:bg-blue-700 hover:text-white transition-all duration-300">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667h-3.554v-11.452h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zm-15.11-13.019c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019h-3.564v-11.452h3.564v11.452zm15.106-20.452h-20.454c-.979 0-1.771.774-1.771 1.729v20.542c0 .956.792 1.729 1.771 1.729h20.451c.978 0 1.778-.773 1.778-1.729v-20.542c0-.955-.8-1.729-1.778-1.729z"/></svg>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="border-t border-white/10 mt-12 pt-8 flex flex-col md:flex-row justify-between items-center text-gray-500 text-sm">
                    <p>&copy; {{ date('Y') }} ChiloMkt. Todos los derechos reservados.</p>
                    <p class="mt-2 md:mt-0">Hecho con estrategia y mentalidad</p>
                </div>
            </div>
        </footer>

        {{-- Scroll animation observer --}}
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('animate-visible');
                            entry.target.style.opacity = '1';
                            entry.target.style.transform = 'translateY(0) translateX(0) scale(1)';
                        }
                    });
                }, { threshold: 0.1, rootMargin: '0px 0px -50px 0px' });

                document.querySelectorAll('[data-animate]').forEach(el => {
                    const type = el.dataset.animate;
                    el.style.opacity = '0';
                    el.style.transition = `all 0.7s cubic-bezier(0.4, 0, 0.2, 1) ${el.dataset.delay || '0s'}`;
                    if (type === 'fade-up') el.style.transform = 'translateY(40px)';
                    else if (type === 'fade-down') el.style.transform = 'translateY(-30px)';
                    else if (type === 'slide-left') el.style.transform = 'translateX(60px)';
                    else if (type === 'slide-right') el.style.transform = 'translateX(-60px)';
                    else if (type === 'scale') el.style.transform = 'scale(0.85)';
                    else if (type === 'fade') el.style.opacity = '0';
                    observer.observe(el);
                });
            });
        </script>
    </body>
</html>
