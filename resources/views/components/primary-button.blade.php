<button {{ $attributes->merge(['type' => 'submit', 'class' => 'px-4 py-2 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 border border-transparent rounded-lg focus:outline-none focus:ring bg-blue-900 hover:bg-blue-700 active:bg-blue-600']) }}>
    {{ $slot }}
</button>


