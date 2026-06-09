<!DOCTYPE html>
<html lang="es" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $titulo ?? 'Acceso' }} - ChiloMkt</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700,800,900&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased text-gray-800" style="font-family: 'Inter', sans-serif;">
        @php
            $logoModo = App\Models\Configuracion::obtener('logo_modo', 'ambos');
            $logoTexto = App\Models\Configuracion::obtener('logo_texto') ?: App\Models\Configuracion::obtener('nombre_sitio', 'ChiloMkt');
            $logoImagen = App\Models\Configuracion::obtener('logo_imagen');
        @endphp

        <div class="min-h-screen relative flex flex-col items-center justify-center px-4 py-12 overflow-hidden bg-gradient-to-br from-gray-900 via-chilo-dark to-gray-900">
            {{-- Decorative blurred blobs --}}
            <div class="absolute top-0 left-0 w-96 h-96 bg-chilo/20 rounded-full -translate-x-1/3 -translate-y-1/3 blur-3xl animate-float-slow"></div>
            <div class="absolute bottom-0 right-0 w-[28rem] h-[28rem] bg-chilo-light/10 rounded-full translate-x-1/3 translate-y-1/3 blur-3xl animate-float"></div>

            {{-- Logo --}}
            <a href="/" wire:navigate class="relative z-10 group flex items-center gap-3 mb-8">
                @if($logoModo !== 'texto')
                    @if($logoImagen)
                        <img src="{{ asset('storage/' . $logoImagen) }}" alt="{{ $logoTexto }}" class="h-12 w-auto object-contain group-hover:scale-110 transition-transform duration-300">
                    @else
                        <div class="w-12 h-12 bg-gradient-to-br from-chilo to-chilo-light rounded-2xl flex items-center justify-center shadow-lg shadow-chilo-dark/40 group-hover:scale-110 transition-transform duration-300">
                            <span class="text-white font-black text-xl">{{ mb_substr($logoTexto, 0, 1) }}</span>
                        </div>
                    @endif
                @endif
                @if($logoModo !== 'imagen')
                    <span class="text-2xl font-bold text-white">{{ $logoTexto }}</span>
                @endif
            </a>

            {{-- Card --}}
            <div class="relative z-10 w-full sm:max-w-md bg-white/95 backdrop-blur-xl shadow-2xl shadow-black/30 rounded-3xl border border-white/20 p-8 sm:p-10">
                {{ $slot }}
            </div>

            {{-- Footer link --}}
            <a href="/" wire:navigate class="relative z-10 mt-8 text-sm text-white/60 hover:text-white transition-colors flex items-center gap-1.5">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                Volver al sitio
            </a>
        </div>
    </body>
</html>
