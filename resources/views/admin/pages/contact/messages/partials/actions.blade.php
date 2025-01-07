<div class="flex space-x-2">
    <!-- View Button -->
    <a href="{{ route('messages.show', $message->id) }}"
       class="px-3 py-2 text-sm text-white bg-blue-500 rounded-md hover:bg-blue-600">
        View
    </a>

    <!-- Delete Button -->
    <form method="POST" action="{{ route('messages.destroy', $message->id) }}" onsubmit="return confirm('Are you sure you want to move this message to trash?');">
        @csrf
        @method('DELETE')
        <button type="submit"
                class="px-3 py-2 text-sm text-white bg-red-500 rounded-md hover:bg-red-600">
            Delete
        </button>
    </form>
</div>
