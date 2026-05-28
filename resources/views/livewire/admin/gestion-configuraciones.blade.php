<div>
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Configuracion del Sitio</h1>

    @if($guardado)
        <div class="bg-green-50 border border-green-200 rounded-lg p-4 mb-6">
            <p class="text-green-700 text-sm font-medium">Configuracion guardada correctamente.</p>
        </div>
    @endif

    <form wire:submit="guardar">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 space-y-6">
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
                    <label class="block text-sm font-medium text-gray-700 mb-1">Telefono</label>
                    <input wire:model="configs.telefono" type="text" class="w-full rounded-lg border-gray-300 focus:border-chilo focus:ring-chilo">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Direccion</label>
                    <input wire:model="configs.direccion" type="text" class="w-full rounded-lg border-gray-300 focus:border-chilo focus:ring-chilo">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">WhatsApp (solo numero, con codigo de pais)</label>
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
                    Guardar configuracion
                </button>
            </div>
        </div>
    </form>
</div>
