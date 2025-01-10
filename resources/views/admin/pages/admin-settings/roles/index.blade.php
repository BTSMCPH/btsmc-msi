<x-app-layout>
    <x-slot name="header">
        {{ __('Manage Roles') }}
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs">
        <div class="flex items-center justify-end mb-4">
            <a href="{{ route('roles.create') }}" class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600">
                {{ __('Add New Role') }}
            </a>
        </div>

        {{-- <div class="mb-4">
            <label class="inline-flex items-center">
                <input type="checkbox" id="show-trashed" class="form-checkbox" {{ request('show-trashed') ? 'checked' : '' }} />
                <span class="ml-2 text-gray-700">{{ __('Show Trashed Users') }}</span>
            </label>
        </div> --}}

        <table id="role-table" class="min-w-full bg-white divide-y divide-gray-200 table-auto stripe hover">
            <thead>
                <tr>
                    <th class="w-1/3 px-4 py-2 text-left">{{ __('Name') }}</th>
                    <th class="w-1/3 px-4 py-2 text-left">{{ __('Guard Name') }}</th>
                    <th class="w-1/3 px-4 py-2 text-left">{{ __('Actions') }}</th>
                </tr>
            </thead>
            <tbody>
                <!-- Rows will be dynamically populated via AJAX -->
            </tbody>
        </table>
    </div>
</x-app-layout>
