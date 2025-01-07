<x-app-layout>
    <x-slot name="header">
        {{ __('Messages') }}
    </x-slot>

    <div class="p-6 bg-white rounded-lg shadow-lg">
        <!-- Success Message -->
        @if(session('success'))
            <div class="p-4 mb-6 text-sm text-green-700 bg-green-100 border border-green-200 rounded-lg" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <!-- View Trashed Button -->
        <div class="flex justify-end mb-4">
            <a href="{{ route('messages.trashed') }}"
               class="px-4 py-2 text-sm font-medium text-white bg-red-500 rounded-md hover:bg-red-600">
                View Trashed
            </a>
        </div>

        <!-- Messages Table -->
        <div class="overflow-x-auto">
            <table id="messages-table" class="w-full border border-collapse border-gray-300 table-auto stripe hover">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="p-3 text-left border border-gray-300">ID</th>
                        <th class="p-3 text-left border border-gray-300">Name</th>
                        <th class="p-3 text-left border border-gray-300">Email</th>
                        <th class="p-3 text-left border border-gray-300">Phone</th>
                        <th class="p-3 text-left border border-gray-300">Message</th>
                        <th class="p-3 text-center border border-gray-300">Actions</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

</x-app-layout>
