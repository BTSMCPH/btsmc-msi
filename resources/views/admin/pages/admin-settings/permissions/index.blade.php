<x-app-layout>
    <x-slot name="header">
        {{ __('Manage Permissions') }}
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs">

        @if (session('success'))
            <div id="success-alert" x-data="{ show: true }" x-show="show"
                class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg shadow">
                <div class="flex items-center justify-between">
                    <span>{{ session('success') }}</span>
                    <button @click="show = false" class="ml-4 text-green-500 hover:text-green-700">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        @endif

        <div class="flex items-center justify-end mb-4">
            <a href="{{ route('permissions.create') }}"
                class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600">
                {{ __('Add New Permission') }}
            </a>
        </div>

        <table id="permission-table"
            class="w-full border border-collapse border-gray-300 table-auto stripe hover dataTable dtr-inline"
            style="width:100%;">
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
