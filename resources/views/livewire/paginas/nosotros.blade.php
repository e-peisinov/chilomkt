<div>
    {{-- Hero --}}
    <section class="relative py-24 sm:py-32 lg:py-40 overflow-hidden bg-gradient-to-br from-gray-900 via-chilo-dark to-gray-900 animate-gradient">
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute top-20 right-20 w-72 h-72 bg-chilo/20 rounded-full blur-3xl animate-float"></div>
            <div class="absolute bottom-10 left-10 w-96 h-96 bg-chilo-light/15 rounded-full blur-3xl animate-float-delay"></div>
            <div class="absolute inset-0 opacity-[0.03]" style="background-image: radial-gradient(circle, white 1px, transparent 1px); background-size: 40px 40px;"></div>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <span class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-sm border border-white/20 text-white/90 text-sm font-medium px-4 py-2 rounded-full mb-6 animate-fade-down">
                Conócenos
            </span>
            <h1 class="text-4xl md:text-6xl font-black text-white mb-6 animate-fade-up">{{ $hero?->titulo ?? 'Sobre Nosotros' }}</h1>
            <p class="text-xl text-white/70 max-w-2xl mx-auto animate-fade-up delay-200">{{ $hero?->subtitulo ?? '' }}</p>
        </div>
    </section>

    {{-- Historia --}}
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div data-animate="slide-right" class="relative">
                    <div class="rounded-2xl overflow-hidden shadow-2xl shadow-chilo/20">
                        <img src="{{ $historiaSeccion?->imagen ? asset('storage/' . $historiaSeccion->imagen) : 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=600&h=450&fit=crop' }}" alt="Equipo ChiloMkt" class="w-full h-72 sm:h-96 lg:h-[450px] object-cover">
                    </div>
                    <div class="absolute -bottom-6 -right-6 w-48 h-48 bg-gradient-to-br from-chilo-dark to-chilo rounded-2xl -z-10"></div>
                </div>
                <div data-animate="slide-left">
                    <span class="inline-block bg-chilo-light/20 text-chilo-dark text-sm font-semibold px-4 py-1.5 rounded-full mb-4">{{ $historiaSeccion?->subtitulo ?? 'Nuestra historia' }}</span>
                    <h2 class="text-3xl md:text-4xl font-black text-gray-900 mb-6">{{ $historiaSeccion?->titulo ?? 'Más que una agencia, somos tu aliado estratégico' }}</h2>
                    <p class="text-gray-500 text-lg leading-relaxed">
                        {{ $hero?->contenido ?? '' }}
                    </p>
                    @if(count($estadisticas) > 0)
                    <div class="flex flex-wrap gap-6 sm:gap-10 mt-8">
                        @foreach($estadisticas as $est)
                        <div class="text-center">
                            <p class="text-3xl font-black text-chilo-dark">{{ $est['valor'] }}</p>
                            <p class="text-sm text-gray-500">{{ $est['etiqueta'] }}</p>
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    {{-- Misión y Visión --}}
    <section class="py-24 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div data-animate="fade-up" class="bg-white rounded-3xl p-10 border border-gray-100 hover:shadow-xl hover:shadow-chilo/10 transition-all duration-500 group">
                    <div class="w-16 h-16 bg-gradient-to-br from-chilo-dark to-chilo rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-500">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    </div>
                    <h3 class="text-2xl font-black text-gray-900 mb-4">{{ $mision?->titulo ?? 'Nuestra misión' }}</h3>
                    <p class="text-gray-500 leading-relaxed text-lg">{{ $mision?->contenido ?? '' }}</p>
                </div>
                <div data-animate="fade-up" data-delay="0.15s" class="bg-white rounded-3xl p-10 border border-gray-100 hover:shadow-xl hover:shadow-chilo/10 transition-all duration-500 group">
                    <div class="w-16 h-16 bg-gradient-to-br from-chilo to-chilo-light rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-500">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                    </div>
                    <h3 class="text-2xl font-black text-gray-900 mb-4">{{ $vision?->titulo ?? 'Nuestra visión' }}</h3>
                    <p class="text-gray-500 leading-relaxed text-lg">{{ $vision?->contenido ?? '' }}</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Valores --}}
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-animate="fade-up">
                <span class="inline-block bg-chilo-light/20 text-chilo-dark text-sm font-semibold px-4 py-1.5 rounded-full mb-4">{{ $valoresSeccion?->subtitulo ?? 'Lo que nos define' }}</span>
                <h2 class="text-3xl md:text-4xl font-black text-gray-900">{{ $valoresSeccion?->titulo ?? 'Nuestros Valores' }}</h2>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @php
                    $iconosValores = [
                        'shield' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z',
                        'bolt' => 'M13 10V3L4 14h7v7l9-11h-7z',
                        'heart' => 'M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z',
                        'users' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z',
                        'star' => 'M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z',
                    ];
                @endphp
                @foreach($valores as $i => $valor)
                    <div data-animate="fade-up" data-delay="{{ $i * 0.1 }}s" class="text-center group">
                        <div class="w-16 h-16 bg-gradient-to-br from-chilo-light/30 to-chilo/20 group-hover:from-chilo-dark group-hover:to-chilo rounded-2xl flex items-center justify-center mx-auto mb-4 transition-all duration-500">
                            <svg class="w-7 h-7 text-chilo-dark group-hover:text-white transition-colors duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $iconosValores[$valor['icono'] ?? 'bolt'] ?? $iconosValores['bolt'] }}"/></svg>
                        </div>
                        <h3 class="font-bold text-gray-900 mb-2">{{ $valor['titulo'] }}</h3>
                        <p class="text-gray-500 text-sm">{{ $valor['descripcion'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Equipo --}}
    <section class="py-24 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-animate="fade-up">
                <span class="inline-block bg-chilo-light/20 text-chilo-dark text-sm font-semibold px-4 py-1.5 rounded-full mb-4">El equipo</span>
                <h2 class="text-3xl md:text-5xl font-black text-gray-900 mb-4">{{ $equipoIntro?->titulo ?? 'Las personas detrás de ChiloMkt' }}</h2>
                <p class="text-gray-500 max-w-2xl mx-auto text-lg">{{ $equipoIntro?->subtitulo ?? 'Profesionales apasionados que hacen posible la magia.' }}</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($miembros as $i => $miembro)
                    <div data-animate="fade-up" data-delay="{{ $i * 0.15 }}s" class="group text-center">
                        <div class="relative inline-block mb-6">
                            @if($miembro->foto)
                                <img src="{{ asset('storage/' . $miembro->foto) }}" alt="{{ $miembro->nombre }}" class="w-40 h-40 rounded-3xl object-cover shadow-lg group-hover:shadow-xl group-hover:shadow-chilo/20 group-hover:-translate-y-2 transition-all duration-500">
                            @else
                                <div class="w-40 h-40 rounded-3xl bg-gradient-to-br from-chilo-dark to-chilo flex items-center justify-center shadow-lg group-hover:shadow-xl group-hover:shadow-chilo/20 group-hover:-translate-y-2 transition-all duration-500">
                                    <span class="text-white font-black text-4xl">{{ mb_substr($miembro->nombre, 0, 1) }}</span>
                                </div>
                            @endif
                            <div class="absolute -bottom-2 -right-2 w-10 h-10 bg-gradient-to-br from-chilo-dark to-chilo rounded-xl flex items-center justify-center shadow-lg">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">{{ $miembro->nombre }}</h3>
                        <p class="text-chilo-dark font-medium text-sm mb-3">{{ $miembro->cargo }}</p>
                        @if($miembro->bio)
                            <p class="text-gray-500 text-sm leading-relaxed max-w-xs mx-auto">{{ $miembro->bio }}</p>
                        @endif
                        <div class="flex justify-center space-x-3 mt-4">
                            @if($miembro->linkedin)
                                <a href="{{ $miembro->linkedin }}" target="_blank" class="w-9 h-9 bg-gray-100 hover:bg-blue-600 rounded-xl flex items-center justify-center text-gray-400 hover:text-white transition-all duration-300">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667h-3.554v-11.452h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zm-15.11-13.019c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019h-3.564v-11.452h3.564v11.452zm15.106-20.452h-20.454c-.979 0-1.771.774-1.771 1.729v20.542c0 .956.792 1.729 1.771 1.729h20.451c.978 0 1.778-.773 1.778-1.729v-20.542c0-.955-.8-1.729-1.778-1.729z"/></svg>
                                </a>
                            @endif
                            @if($miembro->instagram)
                                <a href="{{ $miembro->instagram }}" target="_blank" class="w-9 h-9 bg-gray-100 hover:bg-gradient-to-br hover:from-purple-500 hover:to-pink-500 rounded-xl flex items-center justify-center text-gray-400 hover:text-white transition-all duration-300">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069z"/></svg>
                                </a>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="py-24 bg-white relative overflow-hidden">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center" data-animate="fade-up">
            <div class="bg-gradient-to-br from-chilo-dark via-chilo to-chilo-light rounded-3xl p-12 md:p-16 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full -translate-y-1/2 translate-x-1/2 blur-2xl"></div>
                <div class="relative z-10">
                    <h2 class="text-3xl md:text-4xl font-black text-white mb-4">{{ $ctaSeccion?->titulo ?? '¿Querés trabajar con nosotros?' }}</h2>
                    <p class="text-white/80 text-lg mb-8">{{ $ctaSeccion?->subtitulo ?? 'Contanos sobre tu proyecto y veamos cómo podemos ayudarte.' }}</p>
                    <a href="/contacto" wire:navigate class="inline-flex items-center gap-2 bg-white text-chilo-dark px-10 py-4 rounded-xl font-bold hover:shadow-2xl hover:-translate-y-1 transition-all duration-300">
                        {{ $ctaSeccion?->contenido ?? 'Hablemos' }}
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>
