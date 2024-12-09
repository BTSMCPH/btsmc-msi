<x-app-layout>
    <x-slot name="header">
        {{ __('Create Vacancy') }}
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs">
        <form action="{{ route('vacancy.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Banner Image -->
            <div class="mb-4">
                <x-input-label :value="__('Banner Image')"/>

                <input type="file" name="vacancy_banner_image" id="banner_image" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                @error('vacancy_banner_image')
                    <div class="text-sm text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <!-- Banner Title -->
            <div class="mb-4">
                <label for="banner_title" class="block text-sm font-medium text-gray-700">{{ __('Banner Title') }}</label>
                <input type="text" name="vacancy_banner_title" id="banner_title" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" value="{{ old('banner_title') }}" required>
                @error('vacancy_banner_title')
                    <div class="text-sm text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <!-- Banner Subtitle -->
            <div class="mb-4">
                <label for="banner_subtitle" class="block text-sm font-medium text-gray-700">{{ __('Banner Subtitle') }}</label>
                <input type="text" name="vacancy_banner_subtitle" id="banner_subtitle" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" value="{{ old('banner_subtitle') }}" required>
                @error('vacancy_banner_subtitle')
                    <div class="text-sm text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="mt-4">
                <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600">
                    {{ __('Create Vacancy') }}
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
