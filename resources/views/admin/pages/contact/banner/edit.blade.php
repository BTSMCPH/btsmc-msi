<x-app-layout>
    <x-slot name="header">
        {{ __('Edit Contact Banner') }}
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs">
        <form action="{{ route('contact-banner.update', $contactBanner->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Title -->
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" name="title" id="title"
                    class="w-full px-4 py-2 mt-1 text-sm border rounded-lg focus:outline-none focus:ring focus:ring-blue-300"
                    value="{{ old('title', $contactBanner->title) }}" placeholder="Enter banner title" required>
                @error('title')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <!-- Image Upload with Preview -->
            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700">Upload New Image</label>
                <input type="file" name="image" id="image"
                    class="w-full px-4 py-2 mt-1 text-sm border rounded-lg focus:outline-none focus:ring focus:ring-blue-300"
                    accept="image/*">
                @error('image')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror

                <!-- Image Preview -->
                <div class="mt-4">
                    <img id="image-preview" class="object-cover w-64 h-64 rounded-lg" src="#" alt="New Image Preview" style="display: none;">
                </div>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Current Banner Image</label>
                <img src="{{ asset($contactBanner->image_path) }}" alt="Current Image" class="object-cover w-64 h-64 mt-2 rounded-lg">
            </div>

            <!-- Submit Button -->
            <div class="mt-6">
                <button type="submit"
                    class="px-4 py-2 text-sm font-bold text-white uppercase bg-blue-500 rounded-lg float-end hover:bg-blue-600">
                    Update Banner
                </button>
            </div>
        </form>
    </div>

    <script>
        const imageInput = document.getElementById('image');
        const imagePreview = document.getElementById('image-preview');

        imageInput.addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    imagePreview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
</x-app-layout>
