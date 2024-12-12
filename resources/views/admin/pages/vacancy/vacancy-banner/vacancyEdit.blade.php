<x-app-layout>
    <x-slot name="header">
        {{ __('Vacancy Edit') }}
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs">
        <form action="{{ route('vacancy.update', $vacancy->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Vacancy Title -->
            <div class="mb-4">
                <label for="vacancy_banner_title" class="block text-sm font-medium text-gray-700">{{ __('Vacancy Title') }}</label>
                <input type="text" id="vacancy_banner_title" name="vacancy_banner_title" value="{{ old('vacancy_banner_title', $vacancy->vacancy_banner_title) }}" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
            </div>

            <!-- Vacancy Subtitle -->
            <div class="mb-4">
                <label for="vacancy_banner_subtitle" class="block text-sm font-medium text-gray-700">{{ __('Vacancy Subtitle') }}</label>
                <input type="text" id="vacancy_banner_subtitle" name="vacancy_banner_subtitle" value="{{ old('vacancy_banner_subtitle', $vacancy->vacancy_banner_subtitle) }}" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
            </div>

            <!-- Vacancy Banner Image -->
            <div class="mb-4">
                <label for="vacancy_banner_image" class="block text-sm font-medium text-gray-700">{{ __('Vacancy Banner Image') }}</label>
                <input type="file" id="vacancy_banner_image" name="vacancy_banner_image" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <small class="text-gray-500">{{ __('Leave empty to keep the current image') }}</small>
            </div>

            <!-- Submit Button -->
            <div class="mt-4">
                <button type="submit" class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    {{ __('Update Vacancy') }}
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
