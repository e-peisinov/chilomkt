<div>
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Página de Inicio</h1>
            <p class="text-gray-500 text-sm mt-1">Gestiona el contenido de la página principal</p>
        </div>
        <a href="/" target="_blank" class="text-sm text-chilo-dark hover:underline flex items-center gap-1">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
            Ver página
        </a>
    </div>

    @if($mensaje)
        <div class="mb-4 p-3 rounded-lg text-sm {{ $tipoMensaje === 'exito' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
            {{ $mensaje }}
        </div>
    @endif

    <div class="space-y-3">
        {{-- 1. HERO --}}
        <div class="bg-white rounded-xl border border-gray-200 overflow-hidden" x-data="{ open: false }">
            <button @click="open = !open" class="w-full flex items-center justify-between p-4 hover:bg-gray-50 transition-colors">
                <div class="flex items-center gap-3">
                    <span class="w-8 h-8 bg-chilo-dark/10 rounded-lg flex items-center justify-center text-chilo-dark font-bold text-xs">1</span>
                    <span class="font-semibold text-gray-900">Hero</span>
                    <span class="text-xs text-gray-400">Título, subtítulo y botones</span>
                </div>
                <svg class="w-5 h-5 text-gray-400 transition-transform duration-300" :class="open && 'rotate-180'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
            </button>
            <div x-show="open" x-collapse class="border-t border-gray-100">
                <div class="p-4">
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Título</label>
                            <input wire:model="secciones.hero.titulo" type="text" class="w-full rounded-lg border-gray-300 text-sm focus:border-chilo-dark focus:ring-chilo-dark">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Subtítulo</label>
                            <textarea wire:model="secciones.hero.subtitulo" rows="2" class="w-full rounded-lg border-gray-300 text-sm focus:border-chilo-dark focus:ring-chilo-dark"></textarea>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Imagen del Hero</label>
                            @if(!empty($secciones['hero']['imagen']))
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $secciones['hero']['imagen']) }}" class="h-32 rounded-lg object-cover" alt="Hero actual">
                                    <button type="button" wire:click="quitarImagenSeccion('hero')" class="text-red-500 hover:underline text-xs mt-1">Eliminar imagen</button>
                                </div>
                            @endif
                            <input wire:model="heroImagen" type="file" accept="image/*" class="w-full text-sm">
                            <p class="text-xs text-gray-400 mt-1">Imagen principal del hero (Recomendación 600x400)</p>
                        </div>
                        <button wire:click="guardarSeccion('hero')" class="bg-chilo-dark text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-chilo transition-colors">
                            Guardar Hero
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- 2. ESTADISTICAS --}}
        <div class="bg-white rounded-xl border border-gray-200 overflow-hidden" x-data="{ open: false }">
            <button @click="open = !open" class="w-full flex items-center justify-between p-4 hover:bg-gray-50 transition-colors">
                <div class="flex items-center gap-3">
                    <span class="w-8 h-8 bg-chilo-dark/10 rounded-lg flex items-center justify-center text-chilo-dark font-bold text-xs">2</span>
                    <span class="font-semibold text-gray-900">Estadísticas del Hero</span>
                    <span class="text-xs text-gray-400">Números destacados</span>
                </div>
                <svg class="w-5 h-5 text-gray-400 transition-transform duration-300" :class="open && 'rotate-180'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
            </button>
            <div x-show="open" x-collapse class="border-t border-gray-100">
                <div class="p-4">
                    <div class="space-y-3">
                        @foreach($estadisticas as $i => $est)
                            <div class="flex items-center gap-3">
                                <input wire:model="estadisticas.{{ $i }}.valor" type="text" placeholder="Ej: 50+" class="w-28 rounded-lg border-gray-300 text-sm focus:border-chilo-dark focus:ring-chilo-dark">
                                <input wire:model="estadisticas.{{ $i }}.etiqueta" type="text" placeholder="Ej: Clientes activos" class="flex-1 rounded-lg border-gray-300 text-sm focus:border-chilo-dark focus:ring-chilo-dark">
                                <button wire:click="eliminarEstadistica({{ $i }})" class="text-red-400 hover:text-red-600 p-1">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                </button>
                            </div>
                        @endforeach
                        <div class="flex gap-3">
                            <button wire:click="agregarEstadistica" class="text-sm text-chilo-dark hover:underline flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                                Agregar estadística
                            </button>
                        </div>
                        <button wire:click="guardarSeccion('inicio_estadisticas')" class="bg-chilo-dark text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-chilo transition-colors">
                            Guardar Estadísticas
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- 3. SERVICIOS --}}
        <div class="bg-white rounded-xl border border-gray-200 overflow-hidden" x-data="{ open: false }">
            <button @click="open = !open" class="w-full flex items-center justify-between p-4 hover:bg-gray-50 transition-colors">
                <div class="flex items-center gap-3">
                    <span class="w-8 h-8 bg-chilo-dark/10 rounded-lg flex items-center justify-center text-chilo-dark font-bold text-xs">3</span>
                    <span class="font-semibold text-gray-900">Nuestros Servicios</span>
                    <span class="text-xs text-gray-400">Título de sección + cards de servicios</span>
                </div>
                <svg class="w-5 h-5 text-gray-400 transition-transform duration-300" :class="open && 'rotate-180'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
            </button>
            <div x-show="open" x-collapse class="border-t border-gray-100">
                <div class="p-4">
                    <div class="space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Título de la sección</label>
                                <input wire:model="secciones.servicios_intro.titulo" type="text" class="w-full rounded-lg border-gray-300 text-sm focus:border-chilo-dark focus:ring-chilo-dark">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Subtítulo</label>
                                <input wire:model="secciones.servicios_intro.subtitulo" type="text" class="w-full rounded-lg border-gray-300 text-sm focus:border-chilo-dark focus:ring-chilo-dark">
                            </div>
                        </div>
                        <button wire:click="guardarSeccion('servicios_intro')" class="bg-chilo-dark text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-chilo transition-colors">
                            Guardar título
                        </button>

                        <div class="border-t border-gray-100 pt-4">
                            <div class="flex items-center justify-between mb-3">
                                <h4 class="font-medium text-gray-900 text-sm">Servicios ({{ $servicios->count() }})</h4>
                                <button wire:click="crearServicio" class="bg-chilo-dark text-white px-3 py-1.5 rounded-lg text-xs font-medium hover:bg-chilo transition-colors flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                                    Agregar
                                </button>
                            </div>
                            <div class="space-y-2">
                                @foreach($servicios as $servicio)
                                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                        <div class="flex items-center gap-3">
                                            <span class="text-xs text-gray-400 font-mono">{{ $servicio->orden }}</span>
                                            <span class="text-sm font-medium text-gray-900">{{ $servicio->titulo }}</span>
                                            @if(!$servicio->activo)
                                                <span class="text-xs bg-gray-200 text-gray-500 px-2 py-0.5 rounded-full">Inactivo</span>
                                            @endif
                                        </div>
                                        <div class="flex items-center gap-1">
                                            <button wire:click="editarServicio({{ $servicio->id }})" class="text-gray-400 hover:text-chilo-dark p-1">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                            </button>
                                            <button wire:click="eliminarServicio({{ $servicio->id }})" wire:confirm="¿Eliminar este servicio?" class="text-gray-400 hover:text-red-600 p-1">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                            </button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- 4. CLIENTES --}}
        <div class="bg-white rounded-xl border border-gray-200 overflow-hidden" x-data="{ open: false }">
            <button @click="open = !open" class="w-full flex items-center justify-between p-4 hover:bg-gray-50 transition-colors">
                <div class="flex items-center gap-3">
                    <span class="w-8 h-8 bg-chilo-dark/10 rounded-lg flex items-center justify-center text-chilo-dark font-bold text-xs">4</span>
                    <span class="font-semibold text-gray-900">Clientes</span>
                    <span class="text-xs text-gray-400">Confianza comprobada + logos</span>
                </div>
                <svg class="w-5 h-5 text-gray-400 transition-transform duration-300" :class="open && 'rotate-180'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
            </button>
            <div x-show="open" x-collapse class="border-t border-gray-100">
                <div class="p-4">
                    <div class="space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Título de la sección</label>
                                <input wire:model="secciones.clientes_intro.titulo" type="text" class="w-full rounded-lg border-gray-300 text-sm focus:border-chilo-dark focus:ring-chilo-dark">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Subtítulo</label>
                                <input wire:model="secciones.clientes_intro.subtitulo" type="text" class="w-full rounded-lg border-gray-300 text-sm focus:border-chilo-dark focus:ring-chilo-dark">
                            </div>
                        </div>
                        <button wire:click="guardarSeccion('clientes_intro')" class="bg-chilo-dark text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-chilo transition-colors">
                            Guardar título
                        </button>

                        <div class="border-t border-gray-100 pt-4">
                            <div class="flex items-center justify-between mb-3">
                                <h4 class="font-medium text-gray-900 text-sm">Clientes ({{ $clientes->count() }})</h4>
                                <button wire:click="crearCliente" class="bg-chilo-dark text-white px-3 py-1.5 rounded-lg text-xs font-medium hover:bg-chilo transition-colors flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                                    Agregar
                                </button>
                            </div>
                            <div class="grid grid-cols-2 md:grid-cols-3 gap-2">
                                @foreach($clientes as $cliente)
                                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                        <div class="flex items-center gap-2">
                                            @if($cliente->logo)
                                                <img src="{{ asset('storage/' . $cliente->logo) }}" class="w-8 h-8 object-contain" alt="">
                                            @else
                                                <span class="w-8 h-8 bg-chilo-dark/10 rounded flex items-center justify-center text-xs font-bold text-chilo-dark">{{ mb_substr($cliente->nombre, 0, 2) }}</span>
                                            @endif
                                            <span class="text-sm font-medium text-gray-900">{{ $cliente->nombre }}</span>
                                        </div>
                                        <div class="flex items-center gap-1">
                                            <button wire:click="editarCliente({{ $cliente->id }})" class="text-gray-400 hover:text-chilo-dark p-1">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                            </button>
                                            <button wire:click="eliminarCliente({{ $cliente->id }})" wire:confirm="¿Eliminar este cliente?" class="text-gray-400 hover:text-red-600 p-1">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                            </button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- 5. PROCESO --}}
        <div class="bg-white rounded-xl border border-gray-200 overflow-hidden" x-data="{ open: false }">
            <button @click="open = !open" class="w-full flex items-center justify-between p-4 hover:bg-gray-50 transition-colors">
                <div class="flex items-center gap-3">
                    <span class="w-8 h-8 bg-chilo-dark/10 rounded-lg flex items-center justify-center text-chilo-dark font-bold text-xs">5</span>
                    <span class="font-semibold text-gray-900">Cómo Trabajamos</span>
                    <span class="text-xs text-gray-400">Proceso y pasos</span>
                </div>
                <svg class="w-5 h-5 text-gray-400 transition-transform duration-300" :class="open && 'rotate-180'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
            </button>
            <div x-show="open" x-collapse class="border-t border-gray-100">
                <div class="p-4">
                    <div class="space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Título</label>
                                <input wire:model="secciones.inicio_proceso.titulo" type="text" class="w-full rounded-lg border-gray-300 text-sm focus:border-chilo-dark focus:ring-chilo-dark">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Subtítulo (badge)</label>
                                <input wire:model="secciones.inicio_proceso.subtitulo" type="text" class="w-full rounded-lg border-gray-300 text-sm focus:border-chilo-dark focus:ring-chilo-dark">
                            </div>
                        </div>

                        <div class="border-t border-gray-100 pt-4">
                            <h4 class="font-medium text-gray-900 text-sm mb-3">Pasos del proceso</h4>
                            <div class="space-y-3">
                                @foreach($pasos as $i => $paso)
                                    <div class="flex items-start gap-3 p-3 bg-gray-50 rounded-lg">
                                        <input wire:model="pasos.{{ $i }}.num" type="text" placeholder="01" class="w-14 rounded-lg border-gray-300 text-sm text-center font-mono focus:border-chilo-dark focus:ring-chilo-dark">
                                        <div class="flex-1 space-y-2">
                                            <input wire:model="pasos.{{ $i }}.titulo" type="text" placeholder="Título del paso" class="w-full rounded-lg border-gray-300 text-sm focus:border-chilo-dark focus:ring-chilo-dark">
                                            <input wire:model="pasos.{{ $i }}.descripcion" type="text" placeholder="Descripción" class="w-full rounded-lg border-gray-300 text-sm focus:border-chilo-dark focus:ring-chilo-dark">
                                        </div>
                                        <button wire:click="eliminarPaso({{ $i }})" class="text-red-400 hover:text-red-600 p-1 mt-1">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                    </div>
                                @endforeach
                            </div>
                            <button wire:click="agregarPaso" class="mt-3 text-sm text-chilo-dark hover:underline flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                                Agregar paso
                            </button>
                        </div>

                        <div class="border-t border-gray-100 pt-4">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Imagen de la sección</label>
                            @if(!empty($secciones['inicio_proceso']['imagen']))
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $secciones['inicio_proceso']['imagen']) }}" class="h-32 rounded-lg object-cover" alt="Proceso actual">
                                    <button type="button" wire:click="quitarImagenSeccion('inicio_proceso')" class="text-red-500 hover:underline text-xs mt-1">Eliminar imagen</button>
                                </div>
                            @endif
                            <input wire:model="procesoImagen" type="file" accept="image/*" class="w-full text-sm">
                            <p class="text-xs text-gray-400 mt-1">Imagen que acompaña los pasos del proceso (Recomendación 600x500)</p>
                        </div>

                        <button wire:click="guardarSeccion('inicio_proceso')" class="bg-chilo-dark text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-chilo transition-colors">
                            Guardar Proceso
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- 6. CTA --}}
        <div class="bg-white rounded-xl border border-gray-200 overflow-hidden" x-data="{ open: false }">
            <button @click="open = !open" class="w-full flex items-center justify-between p-4 hover:bg-gray-50 transition-colors">
                <div class="flex items-center gap-3">
                    <span class="w-8 h-8 bg-chilo-dark/10 rounded-lg flex items-center justify-center text-chilo-dark font-bold text-xs">6</span>
                    <span class="font-semibold text-gray-900">Llamada a la Acción (CTA)</span>
                    <span class="text-xs text-gray-400">Sección final con botón</span>
                </div>
                <svg class="w-5 h-5 text-gray-400 transition-transform duration-300" :class="open && 'rotate-180'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
            </button>
            <div x-show="open" x-collapse class="border-t border-gray-100">
                <div class="p-4">
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Título</label>
                            <input wire:model="secciones.inicio_cta.titulo" type="text" class="w-full rounded-lg border-gray-300 text-sm focus:border-chilo-dark focus:ring-chilo-dark">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Subtítulo</label>
                            <textarea wire:model="secciones.inicio_cta.subtitulo" rows="2" class="w-full rounded-lg border-gray-300 text-sm focus:border-chilo-dark focus:ring-chilo-dark"></textarea>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Texto del botón</label>
                            <input wire:model="secciones.inicio_cta.contenido" type="text" class="w-full rounded-lg border-gray-300 text-sm focus:border-chilo-dark focus:ring-chilo-dark">
                        </div>
                        <button wire:click="guardarSeccion('inicio_cta')" class="bg-chilo-dark text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-chilo transition-colors">
                            Guardar CTA
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL SERVICIO --}}
    @if($mostrarModalServicio)
        <div class="fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-4" wire:click.self="$set('mostrarModalServicio', false)">
            <div class="bg-white rounded-xl w-full max-w-lg p-6">
                <h3 class="text-lg font-bold text-gray-900 mb-4">{{ $servicioId ? 'Editar' : 'Nuevo' }} Servicio</h3>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Título *</label>
                        <input wire:model="servicioTitulo" type="text" class="w-full rounded-lg border-gray-300 text-sm">
                        @error('servicioTitulo') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Descripción *</label>
                        <textarea wire:model="servicioDescripcion" rows="3" class="w-full rounded-lg border-gray-300 text-sm"></textarea>
                        @error('servicioDescripcion') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Icono</label>
                            <select wire:model="servicioIcono" class="w-full rounded-lg border-gray-300 text-sm">
                                <option value="">Seleccionar</option>
                                <option value="share">Redes Sociales</option>
                                <option value="megaphone">Publicidad</option>
                                <option value="globe">Web</option>
                                <option value="brain">Coaching</option>
                                <option value="envelope">Email</option>
                                <option value="palette">Diseño</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Orden</label>
                            <input wire:model="servicioOrden" type="number" min="0" class="w-full rounded-lg border-gray-300 text-sm">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Imagen</label>
                        @if($servicioId)
                            @php $servicioExistente = \App\Models\Servicio::find($servicioId); @endphp
                            @if($servicioExistente?->imagen)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $servicioExistente->imagen) }}" class="h-24 rounded-lg object-cover" alt="Imagen actual">
                                    <button type="button" wire:click="quitarServicioImagen" class="text-red-500 hover:underline text-xs mt-1">Eliminar imagen</button>
                                </div>
                            @endif
                        @endif
                        <input wire:model="servicioImagen" type="file" accept="image/*" class="w-full text-sm">
                        <p class="text-xs text-gray-400 mt-1">Imagen de la tarjeta del servicio (Recomendación 500x300)</p>
                    </div>
                    <div class="flex items-center gap-2">
                        <input wire:model="servicioActivo" type="checkbox" id="servActivo" class="rounded border-gray-300 text-chilo-dark focus:ring-chilo-dark">
                        <label for="servActivo" class="text-sm text-gray-700">Activo</label>
                    </div>
                    <div class="flex justify-end gap-3 pt-2">
                        <button wire:click="$set('mostrarModalServicio', false)" class="px-4 py-2 text-sm text-gray-600 hover:text-gray-900">Cancelar</button>
                        <button wire:click="guardarServicio" class="bg-chilo-dark text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-chilo transition-colors">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    {{-- MODAL CLIENTE --}}
    @if($mostrarModalCliente)
        <div class="fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-4" wire:click.self="$set('mostrarModalCliente', false)">
            <div class="bg-white rounded-xl w-full max-w-lg p-6">
                <h3 class="text-lg font-bold text-gray-900 mb-4">{{ $clienteId ? 'Editar' : 'Nuevo' }} Cliente</h3>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nombre *</label>
                        <input wire:model="clienteNombre" type="text" class="w-full rounded-lg border-gray-300 text-sm">
                        @error('clienteNombre') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Descripción</label>
                        <input wire:model="clienteDescripcion" type="text" class="w-full rounded-lg border-gray-300 text-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Sitio web</label>
                        <input wire:model="clienteSitioWeb" type="url" class="w-full rounded-lg border-gray-300 text-sm" placeholder="https://">
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Logo</label>
                            @if($clienteId)
                                @php $clienteExistente = \App\Models\Cliente::find($clienteId); @endphp
                                @if($clienteExistente?->logo)
                                    <div class="mb-2">
                                        <img src="{{ asset('storage/' . $clienteExistente->logo) }}" class="h-16 w-auto object-contain rounded bg-gray-100 p-1" alt="Logo actual">
                                        <button type="button" wire:click="quitarClienteLogo" class="text-red-500 hover:underline text-xs mt-1">Eliminar imagen</button>
                                    </div>
                                @endif
                            @endif
                            <input wire:model="clienteLogo" type="file" accept="image/*" class="w-full text-sm">
                            <p class="text-xs text-gray-400 mt-1">Logo del cliente (Recomendación 200x100)</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Orden</label>
                            <input wire:model="clienteOrden" type="number" min="0" class="w-full rounded-lg border-gray-300 text-sm">
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <input wire:model="clienteActivo" type="checkbox" id="cliActivo" class="rounded border-gray-300 text-chilo-dark focus:ring-chilo-dark">
                        <label for="cliActivo" class="text-sm text-gray-700">Activo</label>
                    </div>
                    <div class="flex justify-end gap-3 pt-2">
                        <button wire:click="$set('mostrarModalCliente', false)" class="px-4 py-2 text-sm text-gray-600 hover:text-gray-900">Cancelar</button>
                        <button wire:click="guardarCliente" class="bg-chilo-dark text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-chilo transition-colors">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    @endif

</div>
