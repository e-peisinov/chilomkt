<div>
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Página Servicios</h1>
            <p class="text-gray-500 text-sm mt-1">Gestiona el contenido de la página de servicios</p>
        </div>
        <a href="/servicios" target="_blank" class="text-sm text-chilo-dark hover:underline flex items-center gap-1">
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
                    <span class="text-xs text-gray-400">Título y subtítulo</span>
                </div>
                <svg class="w-5 h-5 text-gray-400 transition-transform duration-300" :class="open && 'rotate-180'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
            </button>
            <div x-show="open" x-collapse class="border-t border-gray-100">
                <div class="p-4">
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Título</label>
                            <input wire:model="secciones.servicios_hero.titulo" type="text" class="w-full rounded-lg border-gray-300 text-sm focus:border-chilo-dark focus:ring-chilo-dark">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Subtítulo</label>
                            <textarea wire:model="secciones.servicios_hero.subtitulo" rows="2" class="w-full rounded-lg border-gray-300 text-sm focus:border-chilo-dark focus:ring-chilo-dark"></textarea>
                        </div>
                        <button wire:click="guardarSeccion('servicios_hero')" class="bg-chilo-dark text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-chilo transition-colors">
                            Guardar Hero
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- 2. SERVICIOS --}}
        <div class="bg-white rounded-xl border border-gray-200 overflow-hidden" x-data="{ open: false }">
            <button @click="open = !open" class="w-full flex items-center justify-between p-4 hover:bg-gray-50 transition-colors">
                <div class="flex items-center gap-3">
                    <span class="w-8 h-8 bg-chilo-dark/10 rounded-lg flex items-center justify-center text-chilo-dark font-bold text-xs">2</span>
                    <span class="font-semibold text-gray-900">Servicios</span>
                    <span class="text-xs text-gray-400">Lista de servicios ({{ $servicios->count() }})</span>
                </div>
                <svg class="w-5 h-5 text-gray-400 transition-transform duration-300" :class="open && 'rotate-180'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
            </button>
            <div x-show="open" x-collapse class="border-t border-gray-100">
                <div class="p-4">
                    <div class="flex items-center justify-between mb-3">
                        <h4 class="font-medium text-gray-900 text-sm">Servicios</h4>
                        <button wire:click="crearServicio" class="bg-chilo-dark text-white px-3 py-1.5 rounded-lg text-xs font-medium hover:bg-chilo transition-colors flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                            Agregar servicio
                        </button>
                    </div>
                    <div class="space-y-2">
                        @foreach($servicios as $servicio)
                            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                <div class="flex items-center gap-3">
                                    <span class="text-xs text-gray-400 font-mono">{{ $servicio->orden }}</span>
                                    <span class="text-sm font-medium text-gray-900">{{ $servicio->titulo }}</span>
                                    <span class="text-xs text-gray-400">{{ $servicio->icono }}</span>
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

        {{-- 3. CTA --}}
        <div class="bg-white rounded-xl border border-gray-200 overflow-hidden" x-data="{ open: false }">
            <button @click="open = !open" class="w-full flex items-center justify-between p-4 hover:bg-gray-50 transition-colors">
                <div class="flex items-center gap-3">
                    <span class="w-8 h-8 bg-chilo-dark/10 rounded-lg flex items-center justify-center text-chilo-dark font-bold text-xs">3</span>
                    <span class="font-semibold text-gray-900">Llamada a la Acción (CTA)</span>
                </div>
                <svg class="w-5 h-5 text-gray-400 transition-transform duration-300" :class="open && 'rotate-180'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
            </button>
            <div x-show="open" x-collapse class="border-t border-gray-100">
                <div class="p-4">
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Título</label>
                            <input wire:model="secciones.servicios_cta.titulo" type="text" class="w-full rounded-lg border-gray-300 text-sm focus:border-chilo-dark focus:ring-chilo-dark">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Subtítulo</label>
                            <textarea wire:model="secciones.servicios_cta.subtitulo" rows="2" class="w-full rounded-lg border-gray-300 text-sm focus:border-chilo-dark focus:ring-chilo-dark"></textarea>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Texto del botón</label>
                            <input wire:model="secciones.servicios_cta.contenido" type="text" class="w-full rounded-lg border-gray-300 text-sm focus:border-chilo-dark focus:ring-chilo-dark">
                        </div>
                        <button wire:click="guardarSeccion('servicios_cta')" class="bg-chilo-dark text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-chilo transition-colors">
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
                        <p class="text-xs text-gray-400 mt-1">Imagen de la card del servicio (Recomendación 500x300)</p>
                    </div>
                    <div class="flex items-center gap-2">
                        <input wire:model="servicioActivo" type="checkbox" id="servActivoS" class="rounded border-gray-300 text-chilo-dark focus:ring-chilo-dark">
                        <label for="servActivoS" class="text-sm text-gray-700">Activo</label>
                    </div>
                    <div class="flex justify-end gap-3 pt-2">
                        <button wire:click="$set('mostrarModalServicio', false)" class="px-4 py-2 text-sm text-gray-600 hover:text-gray-900">Cancelar</button>
                        <button wire:click="guardarServicio" class="bg-chilo-dark text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-chilo transition-colors">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
