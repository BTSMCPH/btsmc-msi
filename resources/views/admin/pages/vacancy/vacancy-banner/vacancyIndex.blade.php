<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <span> {{ __('Vacancy Banner') }}</span>
        </div>
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs">
        @if($vacancyBanner)
            <div class="max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-md">
                <img src="{{ asset($vacancyBanner->image_path) }}" alt="Vacancy Banner Image"
                    class="object-cover w-full h-64">

                <div class="p-6">
                    <h2 class="mb-2 text-2xl font-bold text-gray-800">
                        {{ $vacancyBanner->title }}
                    </h2>

                    <p class="text-gray-700">
                        {{ $vacancyBanner->description }}
                    </p>

                    <div class="flex justify-end mt-4">
                        <a href="{{ route('vacancy-banner.edit', $vacancyBanner->id) }}"
                            class="px-4 py-2 text-sm font-bold text-white uppercase bg-blue-500 rounded-lg hover:bg-blue-600">
                            Edit Banner
                        </a>
                    </div>
                </div>
            </div>
        @else
            <div class="p-6 text-center">
                <p class="text-lg font-semibold text-gray-700">
                    No vacancy banner available. Create one now!
                </p>
                <a href="{{ route('vacancy-banner.create') }}"
                    class="inline-block px-6 py-3 mt-4 text-sm font-bold text-white uppercase bg-green-500 rounded-lg hover:bg-green-600">
                    Create Vacancy Banner
                </a>
            </div>
        @endif
    </div>
</x-app-layout>
