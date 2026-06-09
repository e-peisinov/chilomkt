<div>
    {{-- Hero Section --}}
    <section class="relative min-h-screen flex items-center overflow-hidden bg-gradient-to-br from-gray-900 via-chilo-dark to-gray-900 animate-gradient">
        {{-- Decorative floating elements --}}
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute top-20 left-10 w-72 h-72 bg-chilo/20 rounded-full blur-3xl animate-float"></div>
            <div class="absolute bottom-20 right-10 w-96 h-96 bg-chilo-light/15 rounded-full blur-3xl animate-float-delay"></div>
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] bg-chilo-dark/30 rounded-full blur-3xl"></div>
            {{-- Grid pattern --}}
            <div class="absolute inset-0 opacity-[0.03]" style="background-image: radial-gradient(circle, white 1px, transparent 1px); background-size: 40px 40px;"></div>
            {{-- Floating icons --}}
            <div class="absolute top-32 right-20 text-white/10 animate-float-slow hidden lg:block">
                <svg class="w-16 h-16" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 00-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 00.502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 002.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 002.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814z"/></svg>
            </div>
            <div class="absolute bottom-40 left-20 text-white/10 animate-float hidden lg:block">
                <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069z"/></svg>
            </div>
            <div class="absolute top-1/3 left-1/4 text-white/10 animate-float-delay hidden lg:block">
                <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 pt-20">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                {{-- Text --}}
                <div>
                    <div class="animate-fade-down">
                        <span class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-sm border border-white/20 text-white/90 text-sm font-medium px-4 py-2 rounded-full mb-6">
                            <span class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></span>
                            Agencia de Marketing Digital
                        </span>
                    </div>
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-black leading-[1.1] text-white mb-6 animate-fade-up">
                        {{ $hero?->titulo ?? 'Estrategia, hábitos y crecimiento real para tu negocio' }}
                    </h1>
                    <p class="text-lg md:text-xl text-white/70 max-w-xl mb-8 animate-fade-up delay-200">
                        {{ $hero?->subtitulo ?? '' }}
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 animate-fade-up delay-300">
                        <a href="/contacto" wire:navigate class="group bg-white text-chilo-dark px-8 py-4 rounded-xl font-bold hover:shadow-2xl hover:shadow-white/20 hover:-translate-y-1 transition-all duration-300 text-center">
                            Quiero crecer mi negocio
                            <span class="inline-block ml-1 group-hover:translate-x-1 transition-transform">&rarr;</span>
                        </a>
                        <a href="/servicios" wire:navigate class="border-2 border-white/30 text-white px-8 py-4 rounded-xl font-bold hover:bg-white/10 hover:border-white/50 transition-all duration-300 text-center backdrop-blur-sm">
                            Ver servicios
                        </a>
                    </div>

                    {{-- Stats mini --}}
                    @if(count($estadisticas) > 0)
                    <div class="flex flex-row flex-wrap gap-8 mt-12 animate-fade-up delay-500">
                        @foreach($estadisticas as $est)
                        <div>
                            <p class="text-3xl font-black text-white">{{ $est['valor'] }}</p>
                            <p class="text-white/50 text-sm">{{ $est['etiqueta'] }}</p>
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>

                {{-- Hero image collage --}}
                <div class="relative hidden lg:block animate-fade-in delay-300">
                    <div class="relative">
                        {{-- Main image --}}
                        <div class="rounded-2xl overflow-hidden shadow-2xl shadow-black/30 rotate-2 hover:rotate-0 transition-transform duration-500">
                            <img src="{{ $hero?->imagen ? asset('storage/' . $hero->imagen) : 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=600&h=400&fit=crop' }}" alt="Marketing Digital" class="w-full h-80 object-cover">
                        </div>
                        {{-- Overlapping card --}}
                        <div class="absolute -bottom-8 -left-8 glass rounded-2xl p-4 shadow-xl animate-float-slow">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-green-500 rounded-full flex items-center justify-center">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                                </div>
                                <div>
                                    <p class="text-white font-bold text-sm">+340% Engagement</p>
                                    <p class="text-white/60 text-xs">Último trimestre</p>
                                </div>
                            </div>
                        </div>
                        {{-- Second floating card --}}
                        <div class="absolute -top-4 -right-4 glass rounded-2xl p-3 shadow-xl animate-float-delay">
                            <div class="flex items-center gap-2">
                                <div class="flex -space-x-2">
                                    <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=32&h=32&fit=crop" class="w-8 h-8 rounded-full border-2 border-white/30" alt="">
                                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=32&h=32&fit=crop" class="w-8 h-8 rounded-full border-2 border-white/30" alt="">
                                    <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=32&h=32&fit=crop" class="w-8 h-8 rounded-full border-2 border-white/30" alt="">
                                </div>
                                <p class="text-white text-xs font-medium">+50 clientes felices</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Scroll indicator --}}
        <div class="absolute bottom-8 left-1/2 -translate-x-1/2 animate-bounce">
            <div class="w-6 h-10 border-2 border-white/30 rounded-full flex justify-center pt-2">
                <div class="w-1.5 h-3 bg-white/60 rounded-full animate-pulse"></div>
            </div>
        </div>
    </section>

    {{-- Servicios Section --}}
    <section class="py-24 bg-white relative overflow-hidden">
        <div class="absolute top-0 right-0 w-96 h-96 bg-chilo-light/10 rounded-full -translate-y-1/2 translate-x-1/2 blur-3xl"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
            <div class="text-center mb-16" data-animate="fade-up">
                <span class="inline-block bg-chilo-light/20 text-chilo-dark text-sm font-semibold px-4 py-1.5 rounded-full mb-4">Lo que hacemos</span>
                <h2 class="text-3xl md:text-5xl font-black text-gray-900 mb-4">
                    {{ $serviciosIntro?->titulo ?? 'Nuestros Servicios' }}
                </h2>
                <p class="text-gray-500 max-w-2xl mx-auto text-lg">
                    {{ $serviciosIntro?->subtitulo ?? '' }}
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($servicios as $i => $servicio)
                    <div data-animate="fade-up" data-delay="{{ $i * 0.1 }}s" class="group bg-white rounded-2xl p-7 border border-gray-100 hover:border-chilo-light/50 hover:shadow-xl hover:shadow-chilo/10 hover:-translate-y-2 transition-all duration-500 relative overflow-hidden">
                        {{-- Hover gradient overlay --}}
                        <div class="absolute inset-0 bg-gradient-to-br from-chilo-dark to-chilo opacity-0 group-hover:opacity-100 transition-opacity duration-500 rounded-2xl"></div>

                        <div class="relative z-10">
                            <div class="w-14 h-14 bg-gradient-to-br from-chilo-light/30 to-chilo/20 group-hover:from-white/20 group-hover:to-white/10 rounded-2xl flex items-center justify-center mb-5 transition-colors duration-500">
                                @switch($servicio->icono)
                                    @case('share')
                                        <svg class="w-7 h-7 text-chilo-dark group-hover:text-white transition-colors duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"/></svg>
                                        @break
                                    @case('megaphone')
                                        <svg class="w-7 h-7 text-chilo-dark group-hover:text-white transition-colors duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"/></svg>
                                        @break
                                    @case('globe')
                                        <svg class="w-7 h-7 text-chilo-dark group-hover:text-white transition-colors duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/></svg>
                                        @break
                                    @case('brain')
                                        <svg class="w-7 h-7 text-chilo-dark group-hover:text-white transition-colors duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
                                        @break
                                    @case('envelope')
                                        <svg class="w-7 h-7 text-chilo-dark group-hover:text-white transition-colors duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                        @break
                                    @case('palette')
                                        <svg class="w-7 h-7 text-chilo-dark group-hover:text-white transition-colors duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"/></svg>
                                        @break
                                    @default
                                        <svg class="w-7 h-7 text-chilo-dark group-hover:text-white transition-colors duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                                @endswitch
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 group-hover:text-white mb-3 transition-colors duration-500">{{ $servicio->titulo }}</h3>
                            <p class="text-gray-500 group-hover:text-white/80 text-sm leading-relaxed transition-colors duration-500">{{ $servicio->descripcion }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-center mt-12" data-animate="fade-up">
                <a href="/servicios" wire:navigate class="inline-flex items-center gap-2 text-chilo-dark font-bold hover:gap-3 transition-all duration-300">
                    Ver todos los servicios
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>
        </div>
    </section>

    {{-- Social Proof / Clientes Section --}}
    <section class="py-24 bg-gray-50 relative overflow-hidden">
        <div class="absolute bottom-0 left-0 w-72 h-72 bg-chilo/10 rounded-full translate-y-1/2 -translate-x-1/2 blur-3xl"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
            <div class="text-center mb-16" data-animate="fade-up">
                <span class="inline-block bg-chilo-light/20 text-chilo-dark text-sm font-semibold px-4 py-1.5 rounded-full mb-4">Confianza comprobada</span>
                <h2 class="text-3xl md:text-5xl font-black text-gray-900 mb-4">
                    {{ $clientesIntro?->titulo ?? 'Clientes que confían en nosotros' }}
                </h2>
                <p class="text-gray-500 max-w-2xl mx-auto text-lg">
                    {{ $clientesIntro?->subtitulo ?? '' }}
                </p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
                @foreach($clientes as $i => $cliente)
                    <div data-animate="scale" data-delay="{{ $i * 0.08 }}s" class="group bg-white rounded-2xl p-6 flex flex-col items-center justify-center text-center hover:shadow-xl hover:shadow-chilo/10 hover:-translate-y-1 transition-all duration-400 border border-gray-100 hover:border-chilo-light/40">
                        @if($cliente->logo)
                            <img src="{{ asset('storage/' . $cliente->logo) }}" alt="{{ $cliente->nombre }}" class="h-12 mb-3 object-contain grayscale group-hover:grayscale-0 transition-all duration-500">
                        @else
                            <div class="w-16 h-16 bg-gradient-to-br from-chilo-light/30 to-chilo/20 group-hover:from-chilo-dark group-hover:to-chilo rounded-2xl flex items-center justify-center mb-3 transition-all duration-500">
                                <span class="text-chilo-dark group-hover:text-white font-black text-lg transition-colors duration-500">{{ mb_substr($cliente->nombre, 0, 2) }}</span>
                            </div>
                        @endif
                        <h4 class="font-bold text-sm text-gray-700 group-hover:text-chilo-dark transition-colors">{{ $cliente->nombre }}</h4>
                        @if($cliente->descripcion)
                            <p class="text-xs text-gray-400 mt-1">{{ $cliente->descripcion }}</p>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Process / How we work --}}
    <section class="py-24 bg-white relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div data-animate="slide-right">
                    <span class="inline-block bg-chilo-light/20 text-chilo-dark text-sm font-semibold px-4 py-1.5 rounded-full mb-4">{{ $procesoSeccion?->subtitulo ?? 'Cómo trabajamos' }}</span>
                    <h2 class="text-3xl md:text-4xl font-black text-gray-900 mb-6">{{ $procesoSeccion?->titulo ?? 'Un proceso pensado para resultados reales' }}</h2>
                    <div class="space-y-6">
                        @foreach($pasos as $paso)
                            <div class="flex gap-4 group">
                                <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-chilo-dark to-chilo rounded-xl flex items-center justify-center text-white font-black text-sm group-hover:scale-110 transition-transform duration-300">
                                    {{ $paso['num'] }}
                                </div>
                                <div>
                                    <h3 class="font-bold text-gray-900 mb-1">{{ $paso['titulo'] }}</h3>
                                    <p class="text-gray-500 text-sm">{{ $paso['descripcion'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div data-animate="slide-left" class="relative">
                    <div class="rounded-2xl overflow-hidden shadow-2xl shadow-chilo/20">
                        <img src="{{ $procesoSeccion?->imagen ? asset('storage/' . $procesoSeccion->imagen) : 'https://images.unsplash.com/photo-1552664730-d307ca884978?w=600&h=500&fit=crop' }}" alt="Equipo trabajando en estrategia" class="w-full h-80 sm:h-96 lg:h-[500px] object-cover">
                    </div>
                    <div class="absolute -bottom-6 -left-6 bg-white rounded-2xl p-5 shadow-xl border border-gray-100" data-animate="scale" data-delay="0.4s">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 bg-gradient-to-br from-green-400 to-green-600 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            </div>
                            <div>
                                <p class="font-bold text-gray-900">+150 proyectos</p>
                                <p class="text-sm text-gray-500">completados con éxito</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Testimonios Section --}}
    @if($testimonios->count())
    <section class="py-24 bg-gradient-to-br from-gray-900 via-chilo-dark to-gray-900 relative overflow-hidden">
        <div class="absolute inset-0 opacity-[0.03]" style="background-image: radial-gradient(circle, white 1px, transparent 1px); background-size: 40px 40px;"></div>
        <div class="absolute top-0 right-0 w-96 h-96 bg-chilo/20 rounded-full translate-x-1/2 -translate-y-1/2 blur-3xl"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
            <div class="text-center mb-16" data-animate="fade-up">
                <span class="inline-block bg-white/10 backdrop-blur-sm text-white/90 text-sm font-semibold px-4 py-1.5 rounded-full mb-4 border border-white/20">Testimonios</span>
                <h2 class="text-3xl md:text-5xl font-black text-white mb-4">{{ $testimoniosSeccion?->titulo ?? 'Lo que dicen nuestros clientes' }}</h2>
                <p class="text-white/50 max-w-2xl mx-auto text-lg">{{ $testimoniosSeccion?->subtitulo ?? 'Historias reales de crecimiento y transformación.' }}</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($testimonios as $i => $testimonio)
                    <div data-animate="fade-up" data-delay="{{ $i * 0.15 }}s" class="glass rounded-2xl p-7 hover:bg-white/15 transition-all duration-500 group">
                        {{-- Stars --}}
                        <div class="flex gap-1 mb-4">
                            @for($s = 0; $s < 5; $s++)
                                <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            @endfor
                        </div>
                        <p class="text-white/80 leading-relaxed mb-6 italic">"{{ $testimonio->contenido }}"</p>
                        <div class="flex items-center gap-3">
                            @if($testimonio->foto)
                                <img src="{{ asset('storage/' . $testimonio->foto) }}" alt="{{ $testimonio->nombre }}" class="w-12 h-12 rounded-full object-cover border-2 border-white/20">
                            @else
                                <div class="w-12 h-12 bg-gradient-to-br from-chilo to-chilo-light rounded-full flex items-center justify-center">
                                    <span class="text-white font-bold">{{ mb_substr($testimonio->nombre, 0, 1) }}</span>
                                </div>
                            @endif
                            <div>
                                <h4 class="font-bold text-white">{{ $testimonio->nombre }}</h4>
                                <p class="text-white/50 text-sm">{{ $testimonio->cargo }}{{ $testimonio->empresa ? ' - ' . $testimonio->empresa : '' }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- CTA Section --}}
    <section class="py-24 bg-white relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-chilo-light/10 to-chilo/5"></div>

        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative" data-animate="fade-up">
            <div class="bg-gradient-to-br from-chilo-dark via-chilo to-chilo-light rounded-3xl p-12 md:p-16 relative overflow-hidden">
                {{-- Decorative --}}
                <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full -translate-y-1/2 translate-x-1/2 blur-2xl"></div>
                <div class="absolute bottom-0 left-0 w-48 h-48 bg-white/10 rounded-full translate-y-1/2 -translate-x-1/2 blur-2xl"></div>

                <div class="relative z-10">
                    <h2 class="text-3xl md:text-5xl font-black text-white mb-4">{{ $ctaSeccion?->titulo ?? '¿Listo para el próximo nivel?' }}</h2>
                    <p class="text-white/80 text-lg mb-8 max-w-xl mx-auto">{{ $ctaSeccion?->subtitulo ?? 'Agenda una consulta gratuita y descubrí cómo podemos transformar tu marca con estrategia y mentalidad.' }}</p>
                    <a href="/contacto" wire:navigate class="inline-flex items-center gap-2 bg-white text-chilo-dark px-10 py-4 rounded-xl font-bold hover:shadow-2xl hover:shadow-black/20 hover:-translate-y-1 transition-all duration-300 text-lg">
                        {{ $ctaSeccion?->contenido ?? 'Empecemos ahora' }}
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>
