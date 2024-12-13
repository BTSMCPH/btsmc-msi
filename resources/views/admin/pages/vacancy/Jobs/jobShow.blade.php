<x-app-layout>
    <x-slot name="header">
        {{ __('Job Details') }}
    </x-slot>


    <div class="p-6 mb-5 bg-white rounded-lg shadow-sm sm:w-full sm:mx-auto">
        <!-- Job Title -->
        <h1 class="pb-4 mb-6 text-3xl font-bold text-gray-800 border-b">
            {{ $job->job_title }}
        </h1>

        <!-- Job Details Grid -->
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">

            <!-- Job Type -->
            <div>
                <h3 class="font-semibold text-gray-600">Job Type</h3>
                <p class="text-gray-800">{{ $job->job_type }}</p>
            </div>

            <!-- Location -->
            <div>
                <h3 class="font-semibold text-gray-600">Location</h3>
                <p class="text-gray-800">{{ $job->location }}</p>
            </div>

            <!-- Schedule -->
            <div>
                <h3 class="font-semibold text-gray-600">Schedule</h3>
                <p class="text-gray-800">{{ $job->schedule }}</p>
            </div>

            <!-- Category -->
            <div>
                <h3 class="font-semibold text-gray-600">Category</h3>
                <p class="text-gray-800">{{ $job->category }}</p>
            </div>

            <!-- Status -->
            <div>
                <h3 class="font-semibold text-gray-600">Status</h3>
                <span class="px-3 py-1 inline-block text-sm font-medium rounded-full {{ $job->status === 'active' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                    {{ ucfirst($job->status) }}
                </span>
            </div>
        </div>

        <!-- Job Requirements -->
        <div class="mt-8 job-requirements">
            <h3 class="mb-2 text-xl font-semibold text-gray-800">Job Requirements</h3>
            <div class="leading-relaxed text-gray-700">
                {!! $job->job_requirements !!}
            </div>
        </div>

        <!-- Job Description -->
        <div class="mt-6 job-description">
            <h3 class="mb-2 text-xl font-semibold text-gray-800">Job Description</h3>
            <p class="leading-relaxed text-gray-700">
                {!! $job->job_description !!}
            </p>
        </div>

        <!-- Buttons -->
        <div class="flex flex-wrap gap-4 mt-8">
            <a href="{{ route('job.index') }}"
                class="inline-block px-6 py-3 text-white transition bg-gray-500 rounded-md shadow-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                Back to Jobs
            </a>

            <a href="{{ route('job.edit', $job->id) }}"
                class="inline-block px-6 py-3 text-white transition bg-yellow-500 rounded-md shadow-md hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                Edit Job
            </a>
        </div>
    </div>
</x-app-layout>
