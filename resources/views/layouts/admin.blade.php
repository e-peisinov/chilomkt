<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $titulo ?? 'Admin' }} - ChiloMkt</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-100">
        <div class="min-h-screen flex" x-data="{ sidebarOpen: false }">
            {{-- Overlay (mobile) --}}
            <div x-show="sidebarOpen" x-cloak
                 @click="sidebarOpen = false"
                 x-transition:enter="transition-opacity ease-out duration-200"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="transition-opacity ease-in duration-150"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 class="fixed inset-0 bg-black/50 z-40 lg:hidden"></div>

            {{-- Sidebar --}}
            <aside class="fixed inset-y-0 left-0 z-50 w-64 bg-chilo-dark text-white flex-shrink-0 overflow-y-auto transform transition-transform duration-300 lg:sticky lg:top-0 lg:h-screen lg:translate-x-0 lg:z-auto"
                   :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'">
                <div class="p-6 flex items-center justify-between">
                    <a href="/admin" wire:navigate class="text-xl font-bold">ChiloMkt Admin</a>
                    <button @click="sidebarOpen = false" class="lg:hidden p-1 text-white/70 hover:text-white" aria-label="Cerrar menú">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>
                <nav class="mt-2 space-y-1 px-3" @click="sidebarOpen = false">
                    <a href="/admin" wire:navigate class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm font-medium {{ request()->is('admin') && !request()->is('admin/*') ? 'bg-white/20 text-white' : 'text-white/70 hover:bg-white/10 hover:text-white' }} transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                        Panel
                    </a>

                    <p class="px-3 pt-4 pb-1 text-xs font-semibold text-white/40 uppercase tracking-wider">Páginas</p>

                    <a href="/admin/pagina/inicio" wire:navigate class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm font-medium {{ request()->is('admin/pagina/inicio') ? 'bg-white/20 text-white' : 'text-white/70 hover:bg-white/10 hover:text-white' }} transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                        Inicio
                    </a>
                    <a href="/admin/pagina/nosotros" wire:navigate class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm font-medium {{ request()->is('admin/pagina/nosotros') ? 'bg-white/20 text-white' : 'text-white/70 hover:bg-white/10 hover:text-white' }} transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        Nosotros
                    </a>
                    <a href="/admin/pagina/servicios" wire:navigate class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm font-medium {{ request()->is('admin/pagina/servicios') ? 'bg-white/20 text-white' : 'text-white/70 hover:bg-white/10 hover:text-white' }} transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        Servicios
                    </a>
                    <a href="/admin/pagina/contacto" wire:navigate class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm font-medium {{ request()->is('admin/pagina/contacto') ? 'bg-white/20 text-white' : 'text-white/70 hover:bg-white/10 hover:text-white' }} transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        Contacto
                        @php $noLeidos = \App\Models\MensajeContacto::where('leido', false)->count(); @endphp
                        @if($noLeidos > 0)
                            <span class="bg-red-500 text-white text-xs rounded-full px-2 py-0.5">{{ $noLeidos }}</span>
                        @endif
                    </a>

                    <p class="px-3 pt-4 pb-1 text-xs font-semibold text-white/40 uppercase tracking-wider">General</p>

                    <a href="/admin/configuraciones" wire:navigate class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm font-medium {{ request()->is('admin/configuraciones') ? 'bg-white/20 text-white' : 'text-white/70 hover:bg-white/10 hover:text-white' }} transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        Configuración
                    </a>
                    <a href="{{ route('register') }}" wire:navigate class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm font-medium {{ request()->routeIs('register') ? 'bg-white/20 text-white' : 'text-white/70 hover:bg-white/10 hover:text-white' }} transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg>
                        Crear usuario
                    </a>

                    <div class="border-t border-white/20 my-4"></div>

                    <a href="/" wire:navigate class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm font-medium text-white/70 hover:bg-white/10 hover:text-white transition-colors" target="_blank">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                        Ver sitio
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm font-medium text-white/70 hover:bg-white/10 hover:text-white transition-colors w-full">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                            Cerrar sesión
                        </button>
                    </form>
                </nav>
            </aside>

            {{-- Main Content --}}
            <div class="flex-1 flex flex-col min-w-0">
                {{-- Top bar (mobile) --}}
                <header class="bg-white shadow-sm lg:hidden">
                    <div class="flex items-center justify-between p-4">
                        <a href="/admin" wire:navigate class="text-lg font-bold text-chilo-dark">ChiloMkt Admin</a>
                        <button @click="sidebarOpen = true" class="p-2 text-gray-600" aria-label="Abrir menú">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                        </button>
                    </div>
                </header>

                {{-- Page Content --}}
                <main class="flex-1 p-6 lg:p-8">
                    {{ $slot }}
                </main>
            </div>
        </div>
    </body>
</html>
