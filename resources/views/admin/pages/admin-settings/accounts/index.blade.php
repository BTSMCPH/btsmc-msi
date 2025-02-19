<x-app-layout>
    <x-slot name="header">
        {{ __('Manage User Account') }}
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-xl font-semibold text-gray-800">{{ __('User Accounts') }}</h2>
            <a href="{{ route('users.create') }}" class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600">
                {{ __('Add New User') }}
            </a>
        </div>

        {{-- <div class="mb-4">
            <label class="inline-flex items-center">
                <input type="checkbox" id="show-trashed" class="form-checkbox" {{ request('show-trashed') ? 'checked' : '' }} />
                <span class="ml-2 text-gray-700">{{ __('Show Trashed Users') }}</span>
            </label>
        </div> --}}

        <table id="user-table" class="w-full border border-collapse border-gray-300 table-auto stripe hover dataTable dtr-inline" style="width:100%;">
            <thead>
                <tr>
                    <th>{{ __('Name') }}</th>
                    <th>{{ __('Email') }}</th>
                    <th>{{ __('Position') }}</th>
                    <th>{{ __('Department') }}</th>
                    <th>{{ __('Status') }}</th>
                    <th>{{ __('Role') }}</th>
                    <th>{{ __('Actions') }}</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</x-app-layout>
