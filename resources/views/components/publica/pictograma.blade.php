@props(['tipo' => 'estrategia'])
{{-- Gráfica de cada servicio, la misma de los posts: el signo de pregunta (estrategia), la grilla del feed
     (redes), el visor REC (audiovisual) y los cuadrados superpuestos (diseño). Toma los colores del slide. --}}
<div data-pictograma="{{ $tipo }}" aria-hidden="true" {{ $attributes->merge(['class' => 'relative aspect-square w-full select-none']) }}>
    @switch($tipo)
        @case('redes')
            <div class="grid grid-cols-3 gap-[6%] w-full h-full">
                @for($i = 0; $i < 9; $i++)
                    <span @if($i !== 4) data-celda @endif class="block border-2 {{ $i === 4 ? 'bg-amarillo border-amarillo' : 'border-[color:var(--calado)]' }}"></span>
                @endfor
            </div>
            @break
        @case('audiovisual')
            <div data-foco class="visor absolute inset-0 text-[color:var(--suave)]">
                <i></i><i></i><i></i><i></i>
                <span class="absolute top-[9%] left-[9%] flex items-center gap-2 font-anton text-lg tracking-wider text-current">
                    <span class="rec-luz w-3.5 h-3.5 rounded-full bg-amarillo"></span>REC
                </span>
                <span data-timecode class="cifras absolute bottom-[9%] right-[9%] font-texto text-sm font-semibold tracking-widest">00:00:00:00</span>
                <span class="absolute left-1/2 top-1/2 w-10 h-px -translate-x-1/2 bg-current"></span>
                <span class="absolute left-1/2 top-1/2 h-10 w-px -translate-y-1/2 bg-current"></span>
            </div>
            @break
        @case('diseno')
            <span data-pieza class="absolute right-[4%] top-[4%] w-[62%] h-[62%] bg-petroleo"></span>
            <span data-pieza class="absolute right-0 top-[10%] w-[60%] h-[60%] border-2 border-amarillo"></span>
            <span data-pieza class="absolute left-[8%] bottom-[10%] w-[34%] h-[34%] bg-hueso"></span>
            @break
        @default
            <span data-signo class="calado absolute inset-0 flex items-center justify-center text-[clamp(12rem,32vw,26rem)] leading-none">?</span>
    @endswitch
</div>
