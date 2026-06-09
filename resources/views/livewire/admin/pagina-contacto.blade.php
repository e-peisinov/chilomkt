<div>
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Página Contacto</h1>
            <p class="text-gray-500 text-sm mt-1">Gestiona el contenido de la página de contacto y mensajes</p>
        </div>
        <a href="/contacto" target="_blank" class="text-sm text-chilo-dark hover:underline flex items-center gap-1">
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
                            <input wire:model="secciones.contacto_hero.titulo" type="text" class="w-full rounded-lg border-gray-300 text-sm focus:border-chilo-dark focus:ring-chilo-dark">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Subtítulo</label>
                            <textarea wire:model="secciones.contacto_hero.subtitulo" rows="2" class="w-full rounded-lg border-gray-300 text-sm focus:border-chilo-dark focus:ring-chilo-dark"></textarea>
                        </div>
                        <button wire:click="guardarSeccion('contacto_hero')" class="bg-chilo-dark text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-chilo transition-colors">
                            Guardar Hero
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- 2. DATOS DE CONTACTO --}}
        <div class="bg-white rounded-xl border border-gray-200 overflow-hidden" x-data="{ open: false }">
            <button @click="open = !open" class="w-full flex items-center justify-between p-4 hover:bg-gray-50 transition-colors">
                <div class="flex items-center gap-3">
                    <span class="w-8 h-8 bg-chilo-dark/10 rounded-lg flex items-center justify-center text-chilo-dark font-bold text-xs">2</span>
                    <span class="font-semibold text-gray-900">Datos de Contacto</span>
                    <span class="text-xs text-gray-400">Email, teléfono, dirección, WhatsApp</span>
                </div>
                <svg class="w-5 h-5 text-gray-400 transition-transform duration-300" :class="open && 'rotate-180'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
            </button>
            <div x-show="open" x-collapse class="border-t border-gray-100">
                <div class="p-4">
                    <div class="space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                                <input wire:model="configEmail" type="email" class="w-full rounded-lg border-gray-300 text-sm focus:border-chilo-dark focus:ring-chilo-dark">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Teléfono</label>
                                <input wire:model="configTelefono" type="text" class="w-full rounded-lg border-gray-300 text-sm focus:border-chilo-dark focus:ring-chilo-dark">
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Dirección</label>
                                <input wire:model="configDireccion" type="text" class="w-full rounded-lg border-gray-300 text-sm focus:border-chilo-dark focus:ring-chilo-dark">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">WhatsApp (sin +, solo números)</label>
                                <input wire:model="configWhatsapp" type="text" class="w-full rounded-lg border-gray-300 text-sm focus:border-chilo-dark focus:ring-chilo-dark" placeholder="5491112345678">
                            </div>
                        </div>
                        <button wire:click="guardarConfigContacto" class="bg-chilo-dark text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-chilo transition-colors">
                            Guardar datos de contacto
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- 3. MENSAJES --}}
        <div class="bg-white rounded-xl border border-gray-200 overflow-hidden" x-data="{ open: false }">
            <button @click="open = !open" class="w-full flex items-center justify-between p-4 hover:bg-gray-50 transition-colors">
                <div class="flex items-center gap-3">
                    <span class="w-8 h-8 bg-chilo-dark/10 rounded-lg flex items-center justify-center text-chilo-dark font-bold text-xs">3</span>
                    <span class="font-semibold text-gray-900">Mensajes Recibidos</span>
                    @php $noLeidos = $mensajes->where('leido', false)->count(); @endphp
                    @if($noLeidos > 0)
                        <span class="text-xs bg-red-100 text-red-600 px-2 py-0.5 rounded-full font-medium">{{ $noLeidos }} sin leer</span>
                    @endif
                </div>
                <svg class="w-5 h-5 text-gray-400 transition-transform duration-300" :class="open && 'rotate-180'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
            </button>
            <div x-show="open" x-collapse class="border-t border-gray-100">
                <div class="p-4">
                    @if($mensajes->isEmpty())
                        <p class="text-gray-400 text-sm text-center py-6">No hay mensajes aún.</p>
                    @else
                        <div class="space-y-3">
                            @foreach($mensajes as $msg)
                                <div class="p-4 rounded-lg border {{ $msg->leido ? 'bg-gray-50 border-gray-100' : 'bg-blue-50 border-blue-100' }}">
                                    <div class="flex items-start justify-between">
                                        <div class="flex-1">
                                            <div class="flex items-center gap-2 mb-1">
                                                <span class="font-semibold text-sm text-gray-900">{{ $msg->nombre }}</span>
                                                <span class="text-xs text-gray-400">{{ $msg->email }}</span>
                                                @if($msg->telefono)
                                                    <span class="text-xs text-gray-400">| {{ $msg->telefono }}</span>
                                                @endif
                                            </div>
                                            <p class="text-sm font-medium text-gray-700 mb-1">{{ $msg->asunto }}</p>
                                            <p class="text-sm text-gray-500">{{ $msg->mensaje }}</p>
                                            <span class="text-xs text-gray-400 mt-2 block">{{ $msg->created_at->diffForHumans() }}</span>
                                        </div>
                                        <div class="flex items-center gap-1 ml-4">
                                            <button wire:click="marcarLeido({{ $msg->id }})" class="text-gray-400 hover:text-chilo-dark p-1" title="{{ $msg->leido ? 'Marcar no leído' : 'Marcar leído' }}">
                                                @if($msg->leido)
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 19v-8.93a2 2 0 01.89-1.664l7-4.666a2 2 0 012.22 0l7 4.666A2 2 0 0121 10.07V19M3 19a2 2 0 002 2h14a2 2 0 002-2M3 19l6.75-4.5M21 19l-6.75-4.5M3 10l6.75 4.5M21 10l-6.75 4.5m0 0l-1.14.76a2 2 0 01-2.22 0l-1.14-.76"/></svg>
                                                @else
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                                @endif
                                            </button>
                                            <button wire:click="eliminarMensaje({{ $msg->id }})" wire:confirm="¿Eliminar este mensaje?" class="text-gray-400 hover:text-red-600 p-1">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="mt-4">
                            {{ $mensajes->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
