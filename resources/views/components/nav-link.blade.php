@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-5 py-3 text-sm bg-slate-600 font-medium border-white leading-5 text-white focus:outline-none transition duration-150 ease-in-out'
            : 'inline-flex items-center px-5 py-3 text-sm font-medium leading-5 text-gray-500 hover:bg-slate-600 hover:text-white focus:outline-none transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
