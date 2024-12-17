<x-app-layout>
    <x-slot name="header">
        {{ __('Contact create banner') }}
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs">
        <form action="{{ route('contact-banner.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Title -->
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" name="title" id="title"
                    class="w-full px-4 py-2 mt-1 text-sm border rounded-lg focus:outline-none focus:ring focus:ring-blue-300"
                    value="{{ old('title') }}" placeholder="Enter banner title" required>
                @error('title')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <!-- Image Upload with Preview -->
            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700">Upload Image</label>
                <input type="file" name="image" id="image"
                    class="w-full px-4 py-2 mt-1 text-sm border rounded-lg focus:outline-none focus:ring focus:ring-blue-300"
                    accept="image/*">
                @error('image')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror

                <!-- Image Preview -->
                <div class="mt-4">
                    <img id="image-preview" class="object-cover w-64 h-64 rounded-lg" src="#" alt="Image Preview" style="display: none;">
                </div>
            </div>

            <!-- Submit Button -->
            <div class="mt-6">
                <button type="submit"
                    class="px-4 py-2 text-sm font-bold text-white uppercase bg-green-500 rounded-lg float-end hover:bg-green-600">
                    Create Banner
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
