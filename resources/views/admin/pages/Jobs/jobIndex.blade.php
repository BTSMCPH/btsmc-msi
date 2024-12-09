<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <span> {{ __('Job positions') }}</span>
            <a href="{{ route('job.create') }}"
                class="px-4 py-2 text-sm font-bold text-white uppercase bg-blue-500 rounded-lg hover:bg-blue-600">
                Create Job position
            </a>
        </div>
    </x-slot>

    @if(session('success'))
    <div class="p-4 mb-4 text-sm text-green-800 bg-green-100 rounded-lg">
        {{ session('success') }}
    </div>
    @endif
    <div class="p-4 mb-10 bg-white rounded-lg shadow-xs">
        <table id="job-table" class="stripe hover" style="width:100%;">
            <thead>
                <tr>
                    <th class="px-4 py-2">Jobs Title</th>
                    <th class="px-4 py-2">Jobs Type</th>
                    <th class="px-4 py-2">Location</th>
                    <th class="px-4 py-2">Schedule</th>
                    <th class="px-4 py-2">Job Requirements</th>
                    <th class="px-4 py-2">Job Description</th>
                    <th class="px-4 py-2">Category</th>
                    <th class="px-4 py-2">Status</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</x-app-layout>
