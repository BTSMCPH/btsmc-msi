<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">

            <!-- Page Title -->
            <h2 class="text-2xl font-bold text-gray-800">
                {{ __('Job Position Create') }}
            </h2>

            <!-- Back Button -->
            <a href="{{ route('job.index') }}"
                class="flex items-center gap-2 px-4 py-2 text-sm font-bold text-white uppercase transition bg-gray-600 rounded-lg hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">

                <!-- Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M18.75 4.5l-7.5 7.5 7.5 7.5m-6-15L5.25 12l7.5 7.5" />
                </svg>

                <span>Back to List</span>
            </a>
        </div>
    </x-slot>

    <div class="p-4 mb-5 bg-white rounded-lg shadow-xs">
        <form action="{{ route('job.store') }}" method="POST">
            @csrf

            <!-- Job Title -->
            <div class="mb-4">
                <label for="job_title" class="block text-sm font-medium text-gray-700">{{ __('Job Title') }}</label>
                <input type="text" name="job_title" id="job_title"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    value="{{ old('job_title') }}" required>
                @error('job_title')
                <div class="text-sm text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <!-- Job Type -->
            <div class="mb-4">
                <label for="job_type" class="block text-sm font-medium text-gray-700">{{ __('Job Type') }}</label>
                <input type="text" name="job_type" id="job_type"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    value="{{ old('job_type') }}" required>
                @error('job_type')
                <div class="text-sm text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <!-- Location -->
            <div class="mb-4">
                <label for="location" class="block text-sm font-medium text-gray-700">{{ __('Location') }}</label>
                <input type="text" name="location" id="location"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    value="{{ old('location') }}" required>
                @error('location')
                <div class="text-sm text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <!-- Schedule -->
            <div class="mb-4">
                <label for="schedule" class="block text-sm font-medium text-gray-700">{{ __('Schedule') }}</label>
                <input type="text" name="schedule" id="schedule"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    value="{{ old('schedule') }}" required>
                @error('schedule')
                <div class="text-sm text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <!-- Status Toggle -->
            <div class="mb-4">
                <label for="status" class="block mb-3 text-sm font-medium text-gray-700">{{ __('Status') }}</label>
                <label class="switch">
                    <input type="hidden" name="status" class="" value="inactive">
                    <input type="checkbox" name="status" id="status" class="" value="active" {{ old('status') === 'active' ? 'checked' : '' }}>
                    <span class="slider"></span>
                </label>
                @error('status')
                <div class="text-sm text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <!-- Category -->
            <div class="mb-4">
                <label for="category" class="block text-sm font-medium text-gray-700">{{ __('Category') }}</label>
                <select name="category" id="category" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
                    <option value="TECHNICAL POSITION" {{ old('category') == 'TECHNICAL POSITION' ? 'selected' : '' }}>Technical Position</option>
                    <option value="BACK OFFICE SUPPORT" {{ old('category') == 'BACK OFFICE SUPPORT' ? 'selected' : '' }}>Back Office Support</option>
                    <option value="INTERNS" {{ old('category') == 'INTERNS' ? 'selected' : '' }}>Interns</option>
                </select>
                @error('category')
                <div class="text-sm text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <!-- Job Requirements -->
            <div class="mb-4">
                <label for="job_requirements" class="block text-sm font-medium text-gray-700">{{ __('Job Requirements') }}</label>
                <textarea id="job_requirements" name="job_requirements" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">{{ old('job_requirements') }}</textarea>
                <input type="hidden" name="job_requirements_html" id="job_requirements_html">
                @error('job_requirements')
                <div class="text-sm text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <!-- Job Description -->
            <div class="mb-4">
                <label for="job_description" class="block text-sm font-medium text-gray-700">{{ __('Job Description') }}</label>
                <textarea id="job_description" name="job_description" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">{{ old('job_description') }}</textarea>
                <input type="hidden" name="job_description_html" id="job_description_html">
                @error('job_description')
                <div class="text-sm text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="px-4 py-2 text-white bg-blue-500">Create</button>
        </form>
    </div>

    <!-- TinyMCE Initialization Script -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Initialize TinyMCE for Job Requirements
            tinymce.init({
                selector: 'textarea#job_requirements',
                menubar: false,
                plugins: 'code table lists image',
                toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | table | image',
                setup: function (editor) {
                    editor.on('change', function () {
                        // Update the hidden input value when content changes
                        document.querySelector('input[name="job_requirements_html"]').value = editor.getContent();
                    });
                }
            });

            // Initialize TinyMCE for Job Description
            tinymce.init({
                selector: 'textarea#job_description',
                menubar: false,
                plugins: 'code table lists image',
                toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | table | image',
                setup: function (editor) {
                    editor.on('change', function () {
                        // Update the hidden input value when content changes
                        document.querySelector('input[name="job_description_html"]').value = editor.getContent();
                    });
                }
            });

            // Form Submission Handling
            document.querySelector('form').addEventListener('submit', function (e) {
                const jobRequirementsHTML = document.querySelector('input[name="job_requirements_html"]').value.trim();
                const jobDescriptionHTML = document.querySelector('input[name="job_description_html"]').value.trim();

                // Validate content before submitting
                if (!jobRequirementsHTML || jobRequirementsHTML === "<p><br></p>" || !jobDescriptionHTML || jobDescriptionHTML === "<p><br></p>") {
                    e.preventDefault();
                    alert('Please fill out all required fields.');
                    return;
                }
            });
        });
    </script>
</x-app-layout>
