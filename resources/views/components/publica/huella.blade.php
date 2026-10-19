@props(['ajustada' => false, 'punto' => '#FFB43A', 'titulo' => null])
{{-- La huella de CHILO: tres arcos concéntricos y el punto. El centro del punto es el (0,0) del viewBox,
     así las escenas escalan cada pieza desde ahí. "ajustada" recorta el aire de la derecha para usarla como logo. --}}
@php
    $arcos = [[306, 40], [213, 44], [120, 50]];
@endphp
<svg viewBox="{{ $ajustada ? '-340 -340 610 680' : '-340 -340 680 680' }}" {{ $attributes->merge(['class' => 'overflow-visible']) }}
     @if($titulo) role="img" aria-label="{{ $titulo }}" @else aria-hidden="true" @endif focusable="false">
    @foreach($arcos as [$r, $a])
        @php
            $x = round($r * cos(deg2rad($a)), 2);
            $y = round($r * sin(deg2rad($a)), 2);
        @endphp
        <path data-arco d="M {{ $x }} {{ -$y }} A {{ $r }} {{ $r }} 0 1 0 {{ $x }} {{ $y }}" fill="none" stroke="currentColor" stroke-width="60" stroke-linecap="round"/>
    @endforeach
    <circle data-punto cx="0" cy="0" r="47" fill="{{ $punto }}"/>
</svg>
