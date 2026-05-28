<div>
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Pagina Nosotros</h1>
            <p class="text-gray-500 text-sm mt-1">Gestiona el contenido de la pagina Sobre Nosotros</p>
        </div>
        <a href="/nosotros" target="_blank" class="text-sm text-chilo-dark hover:underline flex items-center gap-1">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
            Ver pagina
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
                    <span class="text-xs text-gray-400">Titulo y subtitulo de la pagina</span>
                </div>
                <svg class="w-5 h-5 text-gray-400 transition-transform duration-300" :class="open && 'rotate-180'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
            </button>
            <div x-show="open" x-collapse class="border-t border-gray-100">
                <div class="p-4">
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Titulo</label>
                            <input wire:model="secciones.nosotros_hero.titulo" type="text" class="w-full rounded-lg border-gray-300 text-sm focus:border-chilo-dark focus:ring-chilo-dark">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Subtitulo</label>
                            <input wire:model="secciones.nosotros_hero.subtitulo" type="text" class="w-full rounded-lg border-gray-300 text-sm focus:border-chilo-dark focus:ring-chilo-dark">
                        </div>
                        <button wire:click="guardarSeccion('nosotros_hero')" class="bg-chilo-dark text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-chilo transition-colors">
                            Guardar Hero
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- 2. HISTORIA --}}
        <div class="bg-white rounded-xl border border-gray-200 overflow-hidden" x-data="{ open: false }">
            <button @click="open = !open" class="w-full flex items-center justify-between p-4 hover:bg-gray-50 transition-colors">
                <div class="flex items-center gap-3">
                    <span class="w-8 h-8 bg-chilo-dark/10 rounded-lg flex items-center justify-center text-chilo-dark font-bold text-xs">2</span>
                    <span class="font-semibold text-gray-900">Historia</span>
                    <span class="text-xs text-gray-400">Titulo de la seccion de historia</span>
                </div>
                <svg class="w-5 h-5 text-gray-400 transition-transform duration-300" :class="open && 'rotate-180'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
            </button>
            <div x-show="open" x-collapse class="border-t border-gray-100">
                <div class="p-4">
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Badge (etiqueta superior)</label>
                            <input wire:model="secciones.nosotros_historia.subtitulo" type="text" class="w-full rounded-lg border-gray-300 text-sm focus:border-chilo-dark focus:ring-chilo-dark">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Titulo</label>
                            <input wire:model="secciones.nosotros_historia.titulo" type="text" class="w-full rounded-lg border-gray-300 text-sm focus:border-chilo-dark focus:ring-chilo-dark">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Texto de la historia</label>
                            <textarea wire:model="secciones.nosotros_hero.contenido" rows="4" class="w-full rounded-lg border-gray-300 text-sm focus:border-chilo-dark focus:ring-chilo-dark"></textarea>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Imagen de la seccion</label>
                            @if(!empty($secciones['nosotros_historia']['imagen']))
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $secciones['nosotros_historia']['imagen']) }}" class="h-32 rounded-lg object-cover" alt="Historia actual">
                                </div>
                            @endif
                            <input wire:model="historiaImagen" type="file" accept="image/*" class="w-full text-sm">
                            <p class="text-xs text-gray-400 mt-1">Imagen de "Mas que una agencia" (recomendado: 600x450px)</p>
                        </div>
                        <button wire:click="guardarHistoria" class="bg-chilo-dark text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-chilo transition-colors">
                            Guardar Historia
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- 3. ESTADISTICAS --}}
        <div class="bg-white rounded-xl border border-gray-200 overflow-hidden" x-data="{ open: false }">
            <button @click="open = !open" class="w-full flex items-center justify-between p-4 hover:bg-gray-50 transition-colors">
                <div class="flex items-center gap-3">
                    <span class="w-8 h-8 bg-chilo-dark/10 rounded-lg flex items-center justify-center text-chilo-dark font-bold text-xs">3</span>
                    <span class="font-semibold text-gray-900">Estadisticas</span>
                    <span class="text-xs text-gray-400">Numeros de la seccion historia</span>
                </div>
                <svg class="w-5 h-5 text-gray-400 transition-transform duration-300" :class="open && 'rotate-180'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
            </button>
            <div x-show="open" x-collapse class="border-t border-gray-100">
                <div class="p-4">
                    <div class="space-y-3">
                        @foreach($estadisticas as $i => $est)
                            <div class="flex items-center gap-3">
                                <input wire:model="estadisticas.{{ $i }}.valor" type="text" placeholder="Ej: 5+" class="w-28 rounded-lg border-gray-300 text-sm focus:border-chilo-dark focus:ring-chilo-dark">
                                <input wire:model="estadisticas.{{ $i }}.etiqueta" type="text" placeholder="Ej: Anos" class="flex-1 rounded-lg border-gray-300 text-sm focus:border-chilo-dark focus:ring-chilo-dark">
                                <button wire:click="eliminarEstadistica({{ $i }})" class="text-red-400 hover:text-red-600 p-1">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                </button>
                            </div>
                        @endforeach
                        <button wire:click="agregarEstadistica" class="text-sm text-chilo-dark hover:underline flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                            Agregar estadistica
                        </button>
                        <button wire:click="guardarSeccion('nosotros_estadisticas')" class="bg-chilo-dark text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-chilo transition-colors">
                            Guardar Estadisticas
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- 4. MISION --}}
        <div class="bg-white rounded-xl border border-gray-200 overflow-hidden" x-data="{ open: false }">
            <button @click="open = !open" class="w-full flex items-center justify-between p-4 hover:bg-gray-50 transition-colors">
                <div class="flex items-center gap-3">
                    <span class="w-8 h-8 bg-chilo-dark/10 rounded-lg flex items-center justify-center text-chilo-dark font-bold text-xs">4</span>
                    <span class="font-semibold text-gray-900">Mision</span>
                </div>
                <svg class="w-5 h-5 text-gray-400 transition-transform duration-300" :class="open && 'rotate-180'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
            </button>
            <div x-show="open" x-collapse class="border-t border-gray-100">
                <div class="p-4">
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Titulo</label>
                            <input wire:model="secciones.mision.titulo" type="text" class="w-full rounded-lg border-gray-300 text-sm focus:border-chilo-dark focus:ring-chilo-dark">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Contenido</label>
                            <textarea wire:model="secciones.mision.contenido" rows="3" class="w-full rounded-lg border-gray-300 text-sm focus:border-chilo-dark focus:ring-chilo-dark"></textarea>
                        </div>
                        <button wire:click="guardarSeccion('mision')" class="bg-chilo-dark text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-chilo transition-colors">
                            Guardar Mision
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- 5. VISION --}}
        <div class="bg-white rounded-xl border border-gray-200 overflow-hidden" x-data="{ open: false }">
            <button @click="open = !open" class="w-full flex items-center justify-between p-4 hover:bg-gray-50 transition-colors">
                <div class="flex items-center gap-3">
                    <span class="w-8 h-8 bg-chilo-dark/10 rounded-lg flex items-center justify-center text-chilo-dark font-bold text-xs">5</span>
                    <span class="font-semibold text-gray-900">Vision</span>
                </div>
                <svg class="w-5 h-5 text-gray-400 transition-transform duration-300" :class="open && 'rotate-180'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
            </button>
            <div x-show="open" x-collapse class="border-t border-gray-100">
                <div class="p-4">
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Titulo</label>
                            <input wire:model="secciones.vision.titulo" type="text" class="w-full rounded-lg border-gray-300 text-sm focus:border-chilo-dark focus:ring-chilo-dark">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Contenido</label>
                            <textarea wire:model="secciones.vision.contenido" rows="3" class="w-full rounded-lg border-gray-300 text-sm focus:border-chilo-dark focus:ring-chilo-dark"></textarea>
                        </div>
                        <button wire:click="guardarSeccion('vision')" class="bg-chilo-dark text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-chilo transition-colors">
                            Guardar Vision
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- 6. VALORES --}}
        <div class="bg-white rounded-xl border border-gray-200 overflow-hidden" x-data="{ open: false }">
            <button @click="open = !open" class="w-full flex items-center justify-between p-4 hover:bg-gray-50 transition-colors">
                <div class="flex items-center gap-3">
                    <span class="w-8 h-8 bg-chilo-dark/10 rounded-lg flex items-center justify-center text-chilo-dark font-bold text-xs">6</span>
                    <span class="font-semibold text-gray-900">Valores</span>
                    <span class="text-xs text-gray-400">Lo que nos define</span>
                </div>
                <svg class="w-5 h-5 text-gray-400 transition-transform duration-300" :class="open && 'rotate-180'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
            </button>
            <div x-show="open" x-collapse class="border-t border-gray-100">
                <div class="p-4">
                    <div class="space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Titulo de la seccion</label>
                                <input wire:model="secciones.nosotros_valores.titulo" type="text" class="w-full rounded-lg border-gray-300 text-sm focus:border-chilo-dark focus:ring-chilo-dark">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Badge</label>
                                <input wire:model="secciones.nosotros_valores.subtitulo" type="text" class="w-full rounded-lg border-gray-300 text-sm focus:border-chilo-dark focus:ring-chilo-dark">
                            </div>
                        </div>

                        <div class="border-t border-gray-100 pt-4">
                            <h4 class="font-medium text-gray-900 text-sm mb-3">Valores</h4>
                            <div class="space-y-3">
                                @foreach($valores as $i => $valor)
                                    <div class="flex items-start gap-3 p-3 bg-gray-50 rounded-lg">
                                        <select wire:model="valores.{{ $i }}.icono" class="w-28 rounded-lg border-gray-300 text-sm focus:border-chilo-dark focus:ring-chilo-dark">
                                            <option value="shield">Escudo</option>
                                            <option value="bolt">Rayo</option>
                                            <option value="heart">Corazon</option>
                                            <option value="users">Personas</option>
                                            <option value="star">Estrella</option>
                                        </select>
                                        <div class="flex-1 space-y-2">
                                            <input wire:model="valores.{{ $i }}.titulo" type="text" placeholder="Titulo" class="w-full rounded-lg border-gray-300 text-sm focus:border-chilo-dark focus:ring-chilo-dark">
                                            <input wire:model="valores.{{ $i }}.descripcion" type="text" placeholder="Descripcion" class="w-full rounded-lg border-gray-300 text-sm focus:border-chilo-dark focus:ring-chilo-dark">
                                        </div>
                                        <button wire:click="eliminarValor({{ $i }})" class="text-red-400 hover:text-red-600 p-1 mt-1">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                    </div>
                                @endforeach
                            </div>
                            <button wire:click="agregarValor" class="mt-3 text-sm text-chilo-dark hover:underline flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                                Agregar valor
                            </button>
                        </div>

                        <button wire:click="guardarSeccion('nosotros_valores')" class="bg-chilo-dark text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-chilo transition-colors">
                            Guardar Valores
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- 7. EQUIPO --}}
        <div class="bg-white rounded-xl border border-gray-200 overflow-hidden" x-data="{ open: false }">
            <button @click="open = !open" class="w-full flex items-center justify-between p-4 hover:bg-gray-50 transition-colors">
                <div class="flex items-center gap-3">
                    <span class="w-8 h-8 bg-chilo-dark/10 rounded-lg flex items-center justify-center text-chilo-dark font-bold text-xs">7</span>
                    <span class="font-semibold text-gray-900">Equipo</span>
                    <span class="text-xs text-gray-400">Miembros del equipo</span>
                </div>
                <svg class="w-5 h-5 text-gray-400 transition-transform duration-300" :class="open && 'rotate-180'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
            </button>
            <div x-show="open" x-collapse class="border-t border-gray-100">
                <div class="p-4">
                    <div class="space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Titulo de la seccion</label>
                                <input wire:model="secciones.nosotros_equipo_intro.titulo" type="text" class="w-full rounded-lg border-gray-300 text-sm focus:border-chilo-dark focus:ring-chilo-dark">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Subtitulo</label>
                                <input wire:model="secciones.nosotros_equipo_intro.subtitulo" type="text" class="w-full rounded-lg border-gray-300 text-sm focus:border-chilo-dark focus:ring-chilo-dark">
                            </div>
                        </div>
                        <button wire:click="guardarSeccion('nosotros_equipo_intro')" class="bg-chilo-dark text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-chilo transition-colors">
                            Guardar titulo
                        </button>

                        <div class="border-t border-gray-100 pt-4">
                            <div class="flex items-center justify-between mb-3">
                                <h4 class="font-medium text-gray-900 text-sm">Miembros ({{ $miembros->count() }})</h4>
                                <button wire:click="crearMiembro" class="bg-chilo-dark text-white px-3 py-1.5 rounded-lg text-xs font-medium hover:bg-chilo transition-colors flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                                    Agregar
                                </button>
                            </div>
                            <div class="space-y-2">
                                @foreach($miembros as $miembro)
                                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                        <div class="flex items-center gap-3">
                                            @if($miembro->foto)
                                                <img src="{{ asset('storage/' . $miembro->foto) }}" class="w-8 h-8 rounded-full object-cover" alt="">
                                            @else
                                                <span class="w-8 h-8 bg-chilo-dark/10 rounded-full flex items-center justify-center text-xs font-bold text-chilo-dark">{{ mb_substr($miembro->nombre, 0, 1) }}</span>
                                            @endif
                                            <div>
                                                <span class="text-sm font-medium text-gray-900">{{ $miembro->nombre }}</span>
                                                <span class="text-xs text-gray-400 ml-2">{{ $miembro->cargo }}</span>
                                            </div>
                                            @if(!$miembro->activo)
                                                <span class="text-xs bg-gray-200 text-gray-500 px-2 py-0.5 rounded-full">Inactivo</span>
                                            @endif
                                        </div>
                                        <div class="flex items-center gap-1">
                                            <button wire:click="editarMiembro({{ $miembro->id }})" class="text-gray-400 hover:text-chilo-dark p-1">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                            </button>
                                            <button wire:click="eliminarMiembro({{ $miembro->id }})" wire:confirm="Eliminar este miembro?" class="text-gray-400 hover:text-red-600 p-1">
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

        {{-- 8. CTA --}}
        <div class="bg-white rounded-xl border border-gray-200 overflow-hidden" x-data="{ open: false }">
            <button @click="open = !open" class="w-full flex items-center justify-between p-4 hover:bg-gray-50 transition-colors">
                <div class="flex items-center gap-3">
                    <span class="w-8 h-8 bg-chilo-dark/10 rounded-lg flex items-center justify-center text-chilo-dark font-bold text-xs">8</span>
                    <span class="font-semibold text-gray-900">Llamada a la Accion (CTA)</span>
                </div>
                <svg class="w-5 h-5 text-gray-400 transition-transform duration-300" :class="open && 'rotate-180'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
            </button>
            <div x-show="open" x-collapse class="border-t border-gray-100">
                <div class="p-4">
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Titulo</label>
                            <input wire:model="secciones.nosotros_cta.titulo" type="text" class="w-full rounded-lg border-gray-300 text-sm focus:border-chilo-dark focus:ring-chilo-dark">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Subtitulo</label>
                            <textarea wire:model="secciones.nosotros_cta.subtitulo" rows="2" class="w-full rounded-lg border-gray-300 text-sm focus:border-chilo-dark focus:ring-chilo-dark"></textarea>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Texto del boton</label>
                            <input wire:model="secciones.nosotros_cta.contenido" type="text" class="w-full rounded-lg border-gray-300 text-sm focus:border-chilo-dark focus:ring-chilo-dark">
                        </div>
                        <button wire:click="guardarSeccion('nosotros_cta')" class="bg-chilo-dark text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-chilo transition-colors">
                            Guardar CTA
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL MIEMBRO --}}
    @if($mostrarModalMiembro)
        <div class="fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-4" wire:click.self="$set('mostrarModalMiembro', false)">
            <div class="bg-white rounded-xl w-full max-w-lg p-6">
                <h3 class="text-lg font-bold text-gray-900 mb-4">{{ $miembroId ? 'Editar' : 'Nuevo' }} Miembro</h3>
                <div class="space-y-4">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nombre *</label>
                            <input wire:model="miembroNombre" type="text" class="w-full rounded-lg border-gray-300 text-sm">
                            @error('miembroNombre') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Cargo *</label>
                            <input wire:model="miembroCargo" type="text" class="w-full rounded-lg border-gray-300 text-sm">
                            @error('miembroCargo') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Bio</label>
                        <textarea wire:model="miembroBio" rows="3" class="w-full rounded-lg border-gray-300 text-sm"></textarea>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">LinkedIn</label>
                            <input wire:model="miembroLinkedin" type="url" class="w-full rounded-lg border-gray-300 text-sm" placeholder="https://">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Instagram</label>
                            <input wire:model="miembroInstagram" type="url" class="w-full rounded-lg border-gray-300 text-sm" placeholder="https://">
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Foto</label>
                            @if($miembroId)
                                @php $miembroExistente = \App\Models\MiembroEquipo::find($miembroId); @endphp
                                @if($miembroExistente?->foto)
                                    <div class="mb-2">
                                        <img src="{{ asset('storage/' . $miembroExistente->foto) }}" class="h-20 w-20 rounded-full object-cover" alt="Foto actual">
                                    </div>
                                @endif
                            @endif
                            <input wire:model="miembroFoto" type="file" accept="image/*" class="w-full text-sm">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Orden</label>
                            <input wire:model="miembroOrden" type="number" min="0" class="w-full rounded-lg border-gray-300 text-sm">
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <input wire:model="miembroActivo" type="checkbox" id="miemActivo" class="rounded border-gray-300 text-chilo-dark focus:ring-chilo-dark">
                        <label for="miemActivo" class="text-sm text-gray-700">Activo</label>
                    </div>
                    <div class="flex justify-end gap-3 pt-2">
                        <button wire:click="$set('mostrarModalMiembro', false)" class="px-4 py-2 text-sm text-gray-600 hover:text-gray-900">Cancelar</button>
                        <button wire:click="guardarMiembro" class="bg-chilo-dark text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-chilo transition-colors">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
