@props(['active'])

@php
$classes = request()->routeIs('about.index')
            ? 'text-blue-600 font-bold border-b-2 border-blue-600'
            : 'text-gray-600 hover:text-blue-600';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
