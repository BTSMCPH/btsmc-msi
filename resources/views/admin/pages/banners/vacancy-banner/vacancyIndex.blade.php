<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <span> {{ __('Vacancies') }}</span>
            <a href="{{ route('vacancy.create') }}"
                class="px-4 py-2 text-sm font-bold text-white uppercase bg-blue-500 rounded-lg hover:bg-blue-600">
                Create Vacancy
            </a>
        </div>
    </x-slot>

    @if(session('success'))
    <div class="p-4 mb-4 text-sm text-green-800 bg-green-100 rounded-lg">
        {{ session('success') }}
    </div>
    @endif
    <div class="p-4 bg-white rounded-lg shadow-xs">
        <table id="vacancy-table" class="min-w-full border border-gray-300">
            <thead>
                <tr>
                    <th class="px-4 py-2">Banner Image</th>
                    <th class="px-4 py-2">Banner Title</th>
                    <th class="px-4 py-2">Banner Subtitle</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</x-app-layout>
