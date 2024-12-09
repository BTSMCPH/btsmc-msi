<x-app-layout>
    <x-slot name="header">
        {{ __('Job Position Create') }}
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs">
        <form action="{{ route('job.store') }}" method="POST" enctype="multipart/form-data">
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

            <!-- Job Category -->
            <div class="mb-4">
                <label for="category" class="block text-sm font-medium text-gray-700">{{ __('Category') }}</label>
                <select name="category" id="category" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
                    <option value="TECHNICAL POSITION" {{ old('category', $job->category) == 'TECHNICAL POSITION' ? 'selected' : '' }}>Technical Position</option>
                    <option value="BACK OFFICE SUPPORT" {{ old('category', $job->category) == 'BACK OFFICE SUPPORT' ? 'selected' : '' }}>Back Office Support</option>
                    <option value="INTERNS" {{ old('category', $job->category) == 'INTERNS' ? 'selected' : '' }}>Interns</option>
                </select>
                @error('category')
                <div class="text-sm text-red-500">{{ $message }}</div>
                @enderror
            </div>


            <!-- Job Status -->
            <div class="mb-4">
                <label for="status" class="block text-sm font-medium text-gray-700">{{ __('Status') }}</label>
                <select name="status" id="status" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
                    <option value="active" {{ old('status', $job->status) == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ old('status', $job->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    <option value="draft" {{ old('status', $job->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                </select>
                @error('status')
                <div class="text-sm text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <!-- Job Requirements -->
            <div class="mb-4">
                <label for="job_requirements" class="block text-sm font-medium text-gray-700">{{ __('Job Requirements') }}</label>
                <textarea id="job_requirements" name="job_requirements" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm"></textarea>
                @error('job_requirements')
                <div class="text-sm text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <!-- Job Description -->
            <div class="mb-4">
                <label for="job_description" class="block text-sm font-medium text-gray-700">{{ __('Job Description') }}</label>
                <textarea id="job_description" name="job_description" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm"></textarea>
                @error('job_description')
                <div class="text-sm text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="mt-4">
                <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600">
                    {{ __('Create') }}
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
