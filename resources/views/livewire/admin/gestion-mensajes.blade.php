<div>
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Mensajes de Contacto</h1>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        @if($mensajes->count())
            <div class="divide-y divide-gray-100">
                @foreach($mensajes as $msg)
                    <div class="p-4 {{ $msg->leido ? '' : 'bg-blue-50/50' }}">
                        <div class="flex items-start justify-between cursor-pointer" wire:click="ver({{ $msg->id }})">
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center gap-2 mb-1">
                                    @if(!$msg->leido)
                                        <span class="w-2 h-2 bg-blue-500 rounded-full flex-shrink-0"></span>
                                    @endif
                                    <p class="font-medium text-sm text-gray-800">{{ $msg->nombre }}</p>
                                    <span class="text-xs text-gray-400">{{ $msg->email }}</span>
                                </div>
                                <p class="text-sm font-medium text-gray-700">{{ $msg->asunto }}</p>
                                @if($mensajeSeleccionado !== $msg->id)
                                    <p class="text-sm text-gray-500 truncate">{{ $msg->mensaje }}</p>
                                @endif
                                <p class="text-xs text-gray-400 mt-1">{{ $msg->created_at->format('d/m/Y H:i') }}</p>
                            </div>
                            <button wire:click.stop="eliminar({{ $msg->id }})" wire:confirm="Seguro que queres eliminar este mensaje?" class="text-red-400 hover:text-red-600 ml-4 flex-shrink-0">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                            </button>
                        </div>
                        @if($mensajeSeleccionado === $msg->id)
                            <div class="mt-3 p-4 bg-gray-50 rounded-lg">
                                <p class="text-sm text-gray-700 whitespace-pre-line">{{ $msg->mensaje }}</p>
                                @if($msg->telefono)
                                    <p class="text-sm text-gray-500 mt-2">Tel: {{ $msg->telefono }}</p>
                                @endif
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
            <div class="p-4 border-t">
                {{ $mensajes->links() }}
            </div>
        @else
            <div class="p-8 text-center text-gray-500">
                No hay mensajes aun.
            </div>
        @endif
    </div>
</div>
