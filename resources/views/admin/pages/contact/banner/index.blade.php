<x-app-layout>
    <x-slot name="header">
        {{ __('Contact Banner') }}
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs">
        <div class="overflow-x-auto">
            <table class="min-w-full border border-collapse border-gray-200 table-auto">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-6 py-3 text-sm font-medium tracking-wider text-left text-gray-700 uppercase border border-gray-200">Title</th>
                        <th class="px-6 py-3 text-sm font-medium tracking-wider text-left text-gray-700 uppercase border border-gray-200">Image</th>
                        <th class="px-6 py-3 text-sm font-medium tracking-wider text-left text-gray-700 uppercase border border-gray-200">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if($contactBanner)
                        <tr class="bg-white hover:bg-gray-50">
                            <td class="px-6 py-4 text-sm text-gray-700 border border-gray-200">{{ $contactBanner->title }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700 border border-gray-200">
                                <img src="{{ asset($contactBanner->image_path) }}" alt="Contact Banner Image" class="object-cover w-16 h-16 rounded-md">
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-700 border border-gray-200">
                                <a href="{{ route('contact-banner.edit', $contactBanner->id) }}" class="px-4 py-2 text-white bg-green-500 rounded-md hover:bg-green-600">Edit</a>
                            </td>
                        </tr>
                    @else
                        <tr>
                            <td colspan="3" class="px-6 py-4 text-sm text-center text-gray-700 border border-gray-200">
                                No contact banner available. Create one now!
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" class="px-6 py-4 text-center">
                                <a href="{{ route('contact-banner.create') }}" class="px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600">Create Banner</a>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
