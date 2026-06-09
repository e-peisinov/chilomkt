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
                Escribinos
            </span>
            <h1 class="text-4xl md:text-6xl font-black text-white mb-6 animate-fade-up">{{ $hero?->titulo ?? 'Contactanos' }}</h1>
            <p class="text-xl text-white/70 max-w-2xl mx-auto animate-fade-up delay-200">{{ $hero?->subtitulo ?? '' }}</p>
        </div>
    </section>

    <section class="py-24 bg-white relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                {{-- Info de contacto --}}
                <div class="lg:col-span-1 space-y-6" data-animate="slide-right">
                    <div class="bg-gray-50 rounded-2xl p-6 hover:shadow-lg hover:shadow-chilo/10 transition-all duration-500 group border border-gray-100">
                        <div class="w-12 h-12 bg-gradient-to-br from-chilo-dark to-chilo rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        <h3 class="font-bold text-gray-900 mb-1">Email</h3>
                        <p class="text-gray-500">{{ $emailContacto }}</p>
                    </div>
                    <div class="bg-gray-50 rounded-2xl p-6 hover:shadow-lg hover:shadow-chilo/10 transition-all duration-500 group border border-gray-100">
                        <div class="w-12 h-12 bg-gradient-to-br from-chilo-dark to-chilo rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        </div>
                        <h3 class="font-bold text-gray-900 mb-1">Teléfono</h3>
                        <p class="text-gray-500">{{ $telefonoContacto }}</p>
                    </div>
                    <div class="bg-gray-50 rounded-2xl p-6 hover:shadow-lg hover:shadow-chilo/10 transition-all duration-500 group border border-gray-100">
                        <div class="w-12 h-12 bg-gradient-to-br from-chilo-dark to-chilo rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </div>
                        <h3 class="font-bold text-gray-900 mb-1">Ubicación</h3>
                        <p class="text-gray-500">{{ $direccionContacto }}</p>
                    </div>
                    @if($whatsapp)
                        <a href="https://wa.me/{{ $whatsapp }}" target="_blank" class="flex items-center justify-center gap-3 bg-green-500 text-white px-6 py-4 rounded-2xl font-bold hover:bg-green-600 hover:shadow-lg hover:shadow-green-500/30 hover:-translate-y-1 transition-all duration-300">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                            Escribinos por WhatsApp
                        </a>
                    @endif
                </div>

                {{-- Formulario --}}
                <div class="lg:col-span-2" data-animate="slide-left">
                    @if($enviado)
                        <div class="bg-green-50 border border-green-200 rounded-3xl p-12 text-center" data-animate="scale">
                            <div class="w-20 h-20 bg-gradient-to-br from-green-400 to-green-600 rounded-full flex items-center justify-center mx-auto mb-6">
                                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            </div>
                            <h3 class="text-2xl font-black text-green-800 mb-3">Mensaje enviado</h3>
                            <p class="text-green-600 text-lg">Gracias por contactarnos. Te responderemos a la brevedad.</p>
                        </div>
                    @else
                        <div class="bg-gray-50 rounded-3xl p-8 md:p-10 border border-gray-100">
                            <h2 class="text-2xl font-black text-gray-900 mb-6">Enviar mensaje</h2>
                            <form wire:submit="enviar" class="space-y-5">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                    <div>
                                        <label for="nombre" class="block text-sm font-semibold text-gray-700 mb-2">Nombre *</label>
                                        <input wire:model="nombre" type="text" id="nombre" placeholder="Tu nombre" class="w-full rounded-xl border-gray-200 bg-white focus:border-chilo-dark focus:ring-chilo-dark px-4 py-3 transition-colors">
                                        @error('nombre') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                                    </div>
                                    <div>
                                        <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                                        <input wire:model="email" type="email" id="email" placeholder="tu@email.com" class="w-full rounded-xl border-gray-200 bg-white focus:border-chilo-dark focus:ring-chilo-dark px-4 py-3 transition-colors">
                                        @error('email') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                    <div>
                                        <label for="telefono" class="block text-sm font-semibold text-gray-700 mb-2">Teléfono *</label>
                                        <input wire:model="telefono" type="text" id="telefono" placeholder="+54 9 11 ..." class="w-full rounded-xl border-gray-200 bg-white focus:border-chilo-dark focus:ring-chilo-dark px-4 py-3 transition-colors">
                                        @error('telefono') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                                    </div>
                                    <div>
                                        <label for="asunto" class="block text-sm font-semibold text-gray-700 mb-2">Asunto *</label>
                                        <input wire:model="asunto" type="text" id="asunto" placeholder="¿Sobre qué querés hablar?" class="w-full rounded-xl border-gray-200 bg-white focus:border-chilo-dark focus:ring-chilo-dark px-4 py-3 transition-colors">
                                        @error('asunto') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div>
                                    <label for="mensaje" class="block text-sm font-semibold text-gray-700 mb-2">Mensaje *</label>
                                    <textarea wire:model="mensaje" id="mensaje" rows="5" placeholder="Contanos sobre tu proyecto..." class="w-full rounded-xl border-gray-200 bg-white focus:border-chilo-dark focus:ring-chilo-dark px-4 py-3 transition-colors resize-none"></textarea>
                                    @error('mensaje') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                                </div>
                                <button type="submit" class="w-full md:w-auto bg-gradient-to-r from-chilo-dark to-chilo text-white px-10 py-4 rounded-xl font-bold hover:shadow-lg hover:shadow-chilo-dark/30 hover:-translate-y-0.5 transition-all duration-300" wire:loading.attr="disabled" wire:loading.class="opacity-70">
                                    <span wire:loading.remove class="flex items-center justify-center gap-2">
                                        Enviar mensaje
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
                                    </span>
                                    <span wire:loading class="flex items-center justify-center gap-2">
                                        <svg class="animate-spin w-5 h-5" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                                        Enviando...
                                    </span>
                                </button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
</div>
