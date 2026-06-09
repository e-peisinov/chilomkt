<div>
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Panel de Administración</h1>

    {{-- Stats --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Servicios</p>
                    <p class="text-3xl font-bold text-chilo-dark">{{ $totalServicios }}</p>
                </div>
                <div class="w-12 h-12 bg-chilo-light/20 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-chilo-dark" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Clientes</p>
                    <p class="text-3xl font-bold text-chilo-dark">{{ $totalClientes }}</p>
                </div>
                <div class="w-12 h-12 bg-chilo-light/20 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-chilo-dark" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Testimonios</p>
                    <p class="text-3xl font-bold text-chilo-dark">{{ $totalTestimonios }}</p>
                </div>
                <div class="w-12 h-12 bg-chilo-light/20 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-chilo-dark" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/></svg>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Mensajes sin leer</p>
                    <p class="text-3xl font-bold text-{{ $mensajesNoLeidos > 0 ? 'red-500' : 'chilo-dark' }}">{{ $mensajesNoLeidos }}</p>
                </div>
                <div class="w-12 h-12 bg-chilo-light/20 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-chilo-dark" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                </div>
            </div>
        </div>
    </div>

    {{-- Últimos mensajes --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <h2 class="text-lg font-semibold text-gray-800 mb-4">Últimos mensajes</h2>
        @if($ultimosMensajes->count())
            <div class="space-y-3">
                @foreach($ultimosMensajes as $msg)
                    <div class="flex items-start gap-3 p-3 rounded-lg {{ $msg->leido ? 'bg-gray-50' : 'bg-blue-50' }}">
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center gap-2">
                                <p class="font-medium text-sm text-gray-800">{{ $msg->nombre }}</p>
                                @if(!$msg->leido)
                                    <span class="bg-blue-500 text-white text-xs rounded-full px-2 py-0.5">Nuevo</span>
                                @endif
                            </div>
                            <p class="text-sm text-gray-600 truncate">{{ $msg->asunto }} - {{ $msg->mensaje }}</p>
                            <p class="text-xs text-gray-400 mt-1">{{ $msg->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <a href="/admin/mensajes" wire:navigate class="block text-center text-chilo-dark font-medium text-sm mt-4 hover:underline">Ver todos los mensajes</a>
        @else
            <p class="text-gray-500 text-sm">No hay mensajes aún.</p>
        @endif
    </div>
</div>
