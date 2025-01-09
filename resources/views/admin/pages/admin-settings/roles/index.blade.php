<x-app-layout>
    <x-slot name="header">
        {{ __('Manage Roles') }}
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-semibold text-gray-800">{{ __('User Accounts') }}</h2>
            <a href="{{ route('roles.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                {{ __('Add New Role') }}
            </a>
        </div>

        {{-- <div class="mb-4">
            <label class="inline-flex items-center">
                <input type="checkbox" id="show-trashed" class="form-checkbox" {{ request('show-trashed') ? 'checked' : '' }} />
                <span class="ml-2 text-gray-700">{{ __('Show Trashed Users') }}</span>
            </label>
        </div> --}}

        <table id="user-table" class="min-w-full bg-white divide-y divide-gray-200">
            <thead>
                <tr>
                    <th>{{ __('Name') }}</th>
                    <th>{{ __('Slug') }}</th>
                    <th>{{ __('Actions') }}</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</x-app-layout>
