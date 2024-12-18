<x-app-layout>
    <x-slot name="header">
        {{ __('View Message') }}
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">Message Details</h2>
        <div class="mt-4">
            <p><strong>Name:</strong> {{ $message->name }}</p>
            <p><strong>Email:</strong> {{ $message->email }}</p>
            <p><strong>Phone:</strong> {{ $message->phone }}</p>
            <p><strong>Message:</strong></p>
            <p class="p-4 bg-gray-100 rounded">{{ $message->message }}</p>
        </div>
        <div class="flex justify-end gap-2 mt-6">
            <a href="{{ route('messages.index') }}" class="px-4 py-2 text-white bg-gray-500 rounded-md">Back</a>
            <form action="{{ route('messages.destroy', $message->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this message?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-4 py-2 text-white bg-red-600 rounded-md">Delete</button>
            </form>
        </div>
    </div>
</x-app-layout>
