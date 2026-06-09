<div>
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Configuración del Sitio</h1>

    @if($guardado)
        <div class="bg-green-50 border border-green-200 rounded-lg p-4 mb-6">
            <p class="text-green-700 text-sm font-medium">Configuración guardada correctamente.</p>
        </div>
    @endif

    <form wire:submit="guardar">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 space-y-6">
            <h2 class="font-semibold text-gray-700 border-b pb-2">Logo</h2>

            {{-- Modo de visualizacion del logo --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">¿Qué mostrar como logo?</label>
                <div class="flex flex-col sm:flex-row gap-3">
                    @foreach(['texto' => 'Solo texto', 'imagen' => 'Solo imagen', 'ambos' => 'Imagen + texto'] as $valor => $etiqueta)
                        <label class="flex items-center gap-2 px-4 py-2 rounded-lg border cursor-pointer transition-colors {{ ($configs['logo_modo'] ?? 'ambos') === $valor ? 'border-chilo bg-chilo-light/10 text-chilo-dark' : 'border-gray-300 text-gray-600 hover:bg-gray-50' }}">
                            <input wire:model.live="configs.logo_modo" type="radio" value="{{ $valor }}" class="text-chilo focus:ring-chilo">
                            <span class="text-sm font-medium">{{ $etiqueta }}</span>
                        </label>
                    @endforeach
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- Texto del logo --}}
                @if(($configs['logo_modo'] ?? 'ambos') !== 'imagen')
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Texto del logo</label>
                        <input wire:model="configs.logo_texto" type="text" class="w-full rounded-lg border-gray-300 focus:border-chilo focus:ring-chilo" placeholder="ChiloMkt">
                        <p class="text-xs text-gray-400 mt-1">Si no cargás una imagen, se usa la primera letra de este texto como ícono.</p>
                    </div>
                @endif

                {{-- Imagen del logo --}}
                @if(($configs['logo_modo'] ?? 'ambos') !== 'texto')
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Imagen del logo</label>
                        <div class="flex items-center gap-4">
                            @if($logoUpload)
                                <img src="{{ $logoUpload->temporaryUrl() }}" alt="Vista previa" class="h-12 w-auto object-contain rounded bg-gray-100 p-1">
                            @elseif(! empty($configs['logo_imagen']))
                                <img src="{{ asset('storage/' . $configs['logo_imagen']) }}" alt="Logo actual" class="h-12 w-auto object-contain rounded bg-gray-100 p-1">
                            @endif
                            <div class="flex-1">
                                <input wire:model="logoUpload" type="file" accept="image/*" class="block w-full text-sm text-gray-600 file:mr-3 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-chilo-light/20 file:text-chilo-dark hover:file:bg-chilo-light/30 file:cursor-pointer">
                                @if(! empty($configs['logo_imagen']))
                                    <button type="button" wire:click="quitarLogo" class="text-red-500 hover:underline text-xs mt-2">Eliminar imagen</button>
                                @endif
                            </div>
                        </div>
                        @error('logoUpload') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                        <p class="text-xs text-gray-400 mt-1">Formatos de imagen, máximo 2 MB. Recomendado PNG con fondo transparente (Recomendación 200x60).</p>
                    </div>
                @endif
            </div>

            <h2 class="font-semibold text-gray-700 border-b pb-2">General</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nombre del sitio</label>
                    <input wire:model="configs.nombre_sitio" type="text" class="w-full rounded-lg border-gray-300 focus:border-chilo focus:ring-chilo">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Slogan</label>
                    <input wire:model="configs.slogan" type="text" class="w-full rounded-lg border-gray-300 focus:border-chilo focus:ring-chilo">
                </div>
            </div>

            <h2 class="font-semibold text-gray-700 border-b pb-2">Contacto</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input wire:model="configs.email" type="email" class="w-full rounded-lg border-gray-300 focus:border-chilo focus:ring-chilo">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Teléfono</label>
                    <input wire:model="configs.telefono" type="text" class="w-full rounded-lg border-gray-300 focus:border-chilo focus:ring-chilo">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Dirección</label>
                    <input wire:model="configs.direccion" type="text" class="w-full rounded-lg border-gray-300 focus:border-chilo focus:ring-chilo">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">WhatsApp (solo número, con código de país)</label>
                    <input wire:model="configs.whatsapp" type="text" class="w-full rounded-lg border-gray-300 focus:border-chilo focus:ring-chilo" placeholder="5491112345678">
                </div>
            </div>

            <h2 class="font-semibold text-gray-700 border-b pb-2">Redes Sociales</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Instagram</label>
                    <input wire:model="configs.instagram" type="url" class="w-full rounded-lg border-gray-300 focus:border-chilo focus:ring-chilo">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Facebook</label>
                    <input wire:model="configs.facebook" type="url" class="w-full rounded-lg border-gray-300 focus:border-chilo focus:ring-chilo">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">LinkedIn</label>
                    <input wire:model="configs.linkedin" type="url" class="w-full rounded-lg border-gray-300 focus:border-chilo focus:ring-chilo">
                </div>
            </div>

            <div class="flex justify-end pt-4">
                <button type="submit" class="bg-chilo-dark text-white px-6 py-2 rounded-lg font-medium hover:bg-chilo transition-colors">
                    Guardar configuración
                </button>
            </div>
        </div>
    </form>
</div>
