<x-app-layout>
    <x-slot name="header">
        {{ __('Messages') }}
        <a href="{{ route('messages.trashed') }}" class="px-4 py-2 ml-4 text-white bg-yellow-500 rounded-md hover:bg-yellow-600">
            View Trashed
        </a>
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs">

        @if(session('success'))
            <div class="p-4 mb-4 text-green-700 bg-green-100 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <table class="w-full border border-collapse border-gray-300 table-auto">
            <thead>
                <tr class="bg-gray-100">
                    <th class="p-2 border border-gray-300">ID</th>
                    <th class="p-2 border border-gray-300">Name</th>
                    <th class="p-2 border border-gray-300">Email</th>
                    <th class="p-2 border border-gray-300">Phone</th>
                    <th class="p-2 border border-gray-300">Message</th>
                    <th class="p-2 border border-gray-300">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($messages as $message)
                    <tr>
                        <td class="p-2 border border-gray-300">{{ $message->id }}</td>
                        <td class="p-2 border border-gray-300">{{ $message->name }}</td>
                        <td class="p-2 border border-gray-300">{{ $message->email }}</td>
                        <td class="p-2 border border-gray-300">{{ $message->phone }}</td>
                        <td class="p-2 border border-gray-300">{{ Str::limit($message->message, 50) }}</td>
                        <td class="flex p-2 space-x-2 border border-gray-300">
                            <a href="{{ route('messages.show', $message->id) }}"
                               class="px-2 py-1 text-white bg-blue-500 rounded-md">View</a>
                            <form method="POST" action="{{ route('messages.destroy', $message->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="px-2 py-1 text-white bg-red-500 rounded-md"
                                        onclick="return confirm('Are you sure you want to move this message to trash?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="p-4 text-center">No messages found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-4">
            {{ $messages->links() }}
        </div>
    </div>
</x-app-layout>
