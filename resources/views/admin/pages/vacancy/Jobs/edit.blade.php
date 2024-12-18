<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">

            <!-- Page Title -->
            <h2 class="text-2xl font-bold text-gray-800">
                {{ __('Job Position Edit') }}
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

    <div class="p-4 mb-6 bg-white rounded-lg shadow-xs">
        <form action="{{ route('job.update', $job->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <!-- Use PUT method for updating data -->

            <!-- Job Title -->
            <div class="mb-4">
                <label for="job_title" class="block text-sm font-medium text-gray-700">{{ __('Job Title') }}</label>
                <input type="text" name="job_title" id="job_title"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    value="{{ old('job_title', $job->job_title) }}" required>
                @error('job_title')
                <div class="text-sm text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <!-- Job Type -->
            <div class="mb-4">
                <label for="job_type" class="block text-sm font-medium text-gray-700">{{ __('Job Type') }}</label>
                <input type="text" name="job_type" id="job_type"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    value="{{ old('job_type', $job->job_type) }}" required>
                @error('job_type')
                <div class="text-sm text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <!-- Location -->
            <div class="mb-4">
                <label for="location" class="block text-sm font-medium text-gray-700">{{ __('Location') }}</label>
                <input type="text" name="location" id="location"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    value="{{ old('location', $job->location) }}" required>
                @error('location')
                <div class="text-sm text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <!-- Schedule -->
            <div class="mb-4">
                <label for="schedule" class="block text-sm font-medium text-gray-700">{{ __('Schedule') }}</label>
                <input type="text" name="schedule" id="schedule"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    value="{{ old('schedule', $job->schedule) }}" required>
                @error('schedule')
                <div class="text-sm text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <!-- Status Toggle -->
            <div class="mb-4">
                <label for="status" class="block text-sm font-medium text-gray-700">{{ __('Status') }}</label>
                <label class="switch">
                    <input type="hidden" name="status" class="" value="inactive">
                    <input type="checkbox" name="status" id="status" class="" value="active"
                        {{ $job->status == 'active' ? 'checked' : '' }}>
                    <span class="slider"></span>
                </label>
                @error('status')
                <div class="text-sm text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <!-- Job Category -->
            <div class="mb-4">
                <label for="category" class="block text-sm font-medium text-gray-700">{{ __('Category') }}</label>
                <select name="category" id="category"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    required>
                    <option value="TECHNICAL POSITION" {{ old('category', $job->category ?? 'TECHNICAL POSITION') ===
                        'TECHNICAL POSITION' ? 'selected' : '' }}>TECHNICAL POSITION</option>
                    <option value="BACK OFFICE SUPPORT" {{ old('category', $job->category ?? '') === 'BACK OFFICE
                        SUPPORT' ? 'selected' : '' }}>BACK OFFICE SUPPORT</option>
                    <option value="INTERNS" {{ old('category', $job->category ?? '') === 'INTERNS' ? 'selected' : ''
                        }}>INTERNS</option>
                </select>
                @error('category')
                <div class="text-sm text-red-500">{{ $message }}</div>
                @enderror
            </div>

            {{--
            <!-- Hidden input fields for Quill content -->
            <input type="hidden" name="job_requirements" value="{{ old('job_requirements', $job->job_requirements) }}">
            <input type="hidden" name="job_description" value="{{ old('job_description', $job->job_description) }}">
            --}}

            <!-- Job Requirements -->
            <div class="mb-4">
                <label for="job_requirements" class="block mb-2 text-sm font-medium text-gray-700 ">{{ __('Job Requirements')
                    }}</label>
                <textarea id="job_requirements" name="job_requirements"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">{{ old('job_requirements', $job->job_requirements) }}</textarea>
                @error('job_requirements')
                <div class="text-sm text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <!-- Job Description -->
            <div class="mb-4">
                <label for="job_description" class="block mb-2 text-sm font-medium text-gray-700 ">{{ __('Job Description')
                    }}</label>
                <textarea id="job_description" name="job_description"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">{{ old('job_description', $job->job_description) }}</textarea>
                @error('job_description')
                <div class="text-sm text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="mt-4">
                <button type="submit" class="px-4 py-2 font-bold text-white uppercase bg-blue-500 rounded-lg float-end hover:bg-blue-600">
                    {{ __('Update') }}
                </button>
            </div>
        </form>
    </div>

    <!-- Quill Initialization Script -->
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
                    document.querySelector('input[name="job_requirements"]').value = editor.getContent();
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
                    document.querySelector('input[name="job_description"]').value = editor.getContent();
                });
            }
        });

        // Form Submission Handling
        document.querySelector('form').addEventListener('submit', function (e) {
            // Get content from the TinyMCE editors
            const jobRequirementsHTML = document.querySelector('textarea#job_requirements').value.trim();
            const jobDescriptionHTML = document.querySelector('textarea#job_description').value.trim();

            // Assign content to hidden input fields before form submission
            document.querySelector('input[name="job_requirements"]').value = jobRequirementsHTML;
            document.querySelector('input[name="job_description"]').value = jobDescriptionHTML;

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
