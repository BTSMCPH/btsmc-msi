@props(['active' => false])

<a {{ $attributes->merge([
    'class' => 'inline-flex items-center w-full text-sm font-semibold transition-colors text-grey-400 duration-150 hover:text-blue-500' .
                ($active ? ' text-blue-500 rounded-md font-bold italic' : ' text-grey-500')
]) }}>
    @if($active)
        <span
            class="absolute inset-y-0 left-0 w-1 bg-blue-500 rounded-tr-lg rounded-br-lg"
            aria-hidden="true"
        ></span>
    @endif
    {{ $icon ?? '' }}
    <span class="ml-4">{{ $slot }}</span>
</a>
