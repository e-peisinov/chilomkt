<div>
    {{-- Hero --}}
    <section class="relative py-32 lg:py-40 overflow-hidden bg-gradient-to-br from-gray-900 via-chilo-dark to-gray-900 animate-gradient">
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute top-20 left-20 w-72 h-72 bg-chilo/20 rounded-full blur-3xl animate-float"></div>
            <div class="absolute bottom-10 right-10 w-96 h-96 bg-chilo-light/15 rounded-full blur-3xl animate-float-delay"></div>
            <div class="absolute inset-0 opacity-[0.03]" style="background-image: radial-gradient(circle, white 1px, transparent 1px); background-size: 40px 40px;"></div>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <span class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-sm border border-white/20 text-white/90 text-sm font-medium px-4 py-2 rounded-full mb-6 animate-fade-down">
                Soluciones digitales
            </span>
            <h1 class="text-4xl md:text-6xl font-black text-white mb-6 animate-fade-up">{{ $heroSeccion?->titulo ?? 'Nuestros Servicios' }}</h1>
            <p class="text-xl text-white/70 max-w-2xl mx-auto animate-fade-up delay-200">{{ $heroSeccion?->subtitulo ?? 'Soluciones integrales de marketing digital y mentalidad para hacer crecer tu negocio.' }}</p>
        </div>
    </section>

    {{-- Servicios Grid --}}
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @php
                $imagenesFallback = [
                    'share' => 'https://images.unsplash.com/photo-1611162617474-5b21e879e113?w=500&h=300&fit=crop',
                    'megaphone' => 'https://images.unsplash.com/photo-1432888498266-38ffec3eaf0a?w=500&h=300&fit=crop',
                    'globe' => 'https://images.unsplash.com/photo-1547658719-da2b51169166?w=500&h=300&fit=crop',
                    'brain' => 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=500&h=300&fit=crop',
                    'envelope' => 'https://images.unsplash.com/photo-1563986768494-4dee2763ff3f?w=500&h=300&fit=crop',
                    'palette' => 'https://images.unsplash.com/photo-1561070791-2526d30994b5?w=500&h=300&fit=crop',
                ];
            @endphp

            <div class="space-y-8">
                @foreach($servicios as $i => $servicio)
                    <div data-animate="{{ $i % 2 === 0 ? 'slide-right' : 'slide-left' }}" class="group bg-white rounded-3xl border border-gray-100 overflow-hidden hover:shadow-2xl hover:shadow-chilo/10 transition-all duration-500">
                        <div class="grid md:grid-cols-2 gap-0 {{ $i % 2 === 1 ? 'md:grid-flow-dense' : '' }}">
                            {{-- Image --}}
                            <div class="{{ $i % 2 === 1 ? 'md:col-start-2' : '' }} overflow-hidden">
                                <img src="{{ $servicio->imagen ? asset('storage/' . $servicio->imagen) : ($imagenesFallback[$servicio->icono] ?? $imagenesFallback['share']) }}" alt="{{ $servicio->titulo }}" class="w-full h-64 md:h-full object-cover group-hover:scale-105 transition-transform duration-700">
                            </div>
                            {{-- Content --}}
                            <div class="p-8 md:p-12 flex flex-col justify-center">
                                <div class="w-14 h-14 bg-gradient-to-br from-chilo-dark to-chilo rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                                    @switch($servicio->icono)
                                        @case('share')
                                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"/></svg>
                                            @break
                                        @case('megaphone')
                                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"/></svg>
                                            @break
                                        @case('globe')
                                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/></svg>
                                            @break
                                        @case('brain')
                                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
                                            @break
                                        @case('envelope')
                                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                            @break
                                        @case('palette')
                                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"/></svg>
                                            @break
                                        @default
                                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                                    @endswitch
                                </div>
                                <h3 class="text-2xl font-black text-gray-900 mb-3">{{ $servicio->titulo }}</h3>
                                <p class="text-gray-500 leading-relaxed text-lg">{{ $servicio->descripcion }}</p>
                                <a href="/contacto" wire:navigate class="inline-flex items-center gap-2 text-chilo-dark font-bold mt-6 group-hover:gap-3 transition-all duration-300">
                                    Consultar
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="py-24 bg-gray-50">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center" data-animate="fade-up">
            <div class="bg-gradient-to-br from-chilo-dark via-chilo to-chilo-light rounded-3xl p-12 md:p-16 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full -translate-y-1/2 translate-x-1/2 blur-2xl"></div>
                <div class="absolute bottom-0 left-0 w-48 h-48 bg-white/10 rounded-full translate-y-1/2 -translate-x-1/2 blur-2xl"></div>
                <div class="relative z-10">
                    <h2 class="text-3xl md:text-4xl font-black text-white mb-4">{{ $ctaSeccion?->titulo ?? 'Necesitas algo personalizado?' }}</h2>
                    <p class="text-white/80 text-lg mb-8">{{ $ctaSeccion?->subtitulo ?? 'Cada negocio es unico. Contanos que necesitas y armamos una propuesta a tu medida.' }}</p>
                    <a href="/contacto" wire:navigate class="inline-flex items-center gap-2 bg-white text-chilo-dark px-10 py-4 rounded-xl font-bold hover:shadow-2xl hover:-translate-y-1 transition-all duration-300">
                        {{ $ctaSeccion?->contenido ?? 'Solicitar presupuesto' }}
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>
