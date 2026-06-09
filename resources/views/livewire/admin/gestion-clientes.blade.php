<div>
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Clientes</h1>
        <button wire:click="crear" class="bg-chilo-dark text-white px-4 py-2 rounded-lg font-medium hover:bg-chilo transition-colors">
            + Nuevo cliente
        </button>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
        <table class="w-full min-w-[600px]">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Orden</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nombre</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Descripción</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Estado</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach($clientes as $cliente)
                    <tr>
                        <td class="px-6 py-4 text-sm text-gray-600">{{ $cliente->orden }}</td>
                        <td class="px-6 py-4 text-sm font-medium text-gray-800 flex items-center gap-3">
                            @if($cliente->logo)
                                <img src="{{ asset('storage/' . $cliente->logo) }}" class="w-8 h-8 rounded object-contain">
                            @endif
                            {{ $cliente->nombre }}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600">{{ $cliente->descripcion }}</td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 text-xs rounded-full {{ $cliente->activo ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                {{ $cliente->activo ? 'Activo' : 'Inactivo' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right space-x-2">
                            <button wire:click="editar({{ $cliente->id }})" class="text-chilo-dark hover:underline text-sm">Editar</button>
                            <button wire:click="eliminar({{ $cliente->id }})" wire:confirm="¿Seguro que querés eliminar este cliente?" class="text-red-500 hover:underline text-sm">Eliminar</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>

    @if($mostrarModal)
    <div class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 p-4">
        <div class="bg-white rounded-xl shadow-xl w-full max-w-lg max-h-[90vh] overflow-y-auto p-6">
            <h2 class="text-lg font-bold text-gray-800 mb-4">{{ $clienteId ? 'Editar' : 'Nuevo' }} cliente</h2>
            <form wire:submit="guardar" class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nombre *</label>
                    <input wire:model="nombre" type="text" class="w-full rounded-lg border-gray-300 focus:border-chilo focus:ring-chilo">
                    @error('nombre') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Descripción</label>
                    <input wire:model="descripcion" type="text" class="w-full rounded-lg border-gray-300 focus:border-chilo focus:ring-chilo">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Sitio web</label>
                    <input wire:model="sitio_web" type="url" class="w-full rounded-lg border-gray-300 focus:border-chilo focus:ring-chilo" placeholder="https://...">
                    @error('sitio_web') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Logo</label>
                    @if($clienteId)
                        @php $clienteExistente = \App\Models\Cliente::find($clienteId); @endphp
                        @if($clienteExistente?->logo)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $clienteExistente->logo) }}" class="h-16 w-auto object-contain rounded bg-gray-100 p-1" alt="Logo actual">
                                <button type="button" wire:click="quitarLogo" class="text-red-500 hover:underline text-xs mt-1">Eliminar imagen</button>
                            </div>
                        @endif
                    @endif
                    <input wire:model="logo" type="file" class="w-full text-sm">
                    @error('logo') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    <p class="text-xs text-gray-400 mt-1">Logo del cliente (Recomendación 200x100)</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Orden</label>
                    <input wire:model="orden" type="number" class="w-full rounded-lg border-gray-300 focus:border-chilo focus:ring-chilo">
                </div>
                <div class="flex items-center gap-2">
                    <input wire:model="activo" type="checkbox" id="activo" class="rounded border-gray-300 text-chilo-dark focus:ring-chilo">
                    <label for="activo" class="text-sm text-gray-700">Activo</label>
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
