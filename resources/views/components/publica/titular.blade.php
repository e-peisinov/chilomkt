@props(['texto' => '', 'como' => 'h2'])
<{{ $como }} {{ $attributes->merge(['class' => 'titular']) }}>{{ \App\Support\Marca::remate($texto) }}</{{ $como }}>
