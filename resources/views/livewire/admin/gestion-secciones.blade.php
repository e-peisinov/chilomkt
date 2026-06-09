<div>
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Secciones del Sitio</h1>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Página</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Clave</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Título</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach($secciones as $seccion)
                    <tr>
                        <td class="px-6 py-4 text-sm">
                            <span class="bg-chilo-light/20 text-chilo-dark px-2 py-1 rounded text-xs font-medium">{{ $seccion->pagina }}</span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600 font-mono">{{ $seccion->clave }}</td>
                        <td class="px-6 py-4 text-sm font-medium text-gray-800">{{ $seccion->titulo }}</td>
                        <td class="px-6 py-4 text-right">
                            <button wire:click="editar({{ $seccion->id }})" class="text-chilo-dark hover:underline text-sm">Editar</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @if($mostrarModal)
    <div class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 p-4">
        <div class="bg-white rounded-xl shadow-xl w-full max-w-lg max-h-[90vh] overflow-y-auto p-6">
            <h2 class="text-lg font-bold text-gray-800 mb-4">Editar sección</h2>
            <form wire:submit="guardar" class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Título</label>
                    <input wire:model="titulo" type="text" class="w-full rounded-lg border-gray-300 focus:border-chilo focus:ring-chilo">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Subtítulo</label>
                    <input wire:model="subtitulo" type="text" class="w-full rounded-lg border-gray-300 focus:border-chilo focus:ring-chilo">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Contenido</label>
                    <textarea wire:model="contenido" rows="5" class="w-full rounded-lg border-gray-300 focus:border-chilo focus:ring-chilo"></textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Imagen</label>
                    @if($seccionId)
                        @php $seccionExistente = \App\Models\Seccion::find($seccionId); @endphp
                        @if($seccionExistente?->imagen)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $seccionExistente->imagen) }}" class="h-24 rounded-lg object-cover" alt="Imagen actual">
                                <button type="button" wire:click="quitarImagen" class="text-red-500 hover:underline text-xs mt-1">Eliminar imagen</button>
                            </div>
                        @endif
                    @endif
                    <input wire:model="imagen" type="file" class="w-full text-sm">
                    @error('imagen') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    <p class="text-xs text-gray-400 mt-1">Imagen de la sección (Recomendación 600x400)</p>
                </div>
                <div class="flex justify-end gap-3 pt-2">
                    <button type="button" wire:click="$set('mostrarModal', false)" class="px-4 py-2 text-gray-600 hover:text-gray-800">Cancelar</button>
                    <button type="submit" class="bg-chilo-dark text-white px-6 py-2 rounded-lg font-medium hover:bg-chilo transition-colors">Guardar</button>
                </div>
            </form>
        </div>
    </div>
    @endif
</div>
