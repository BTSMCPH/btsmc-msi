<x-app-layout>
    <x-slot name="header">
        {{ __('Roles Edit') }}
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs">
        <!-- Display Validation Errors -->
        @if ($errors->any())
            <div class="mb-4 text-red-600">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Edit Role Form -->
        <form action="{{ route('roles.update', $role->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Role Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $role->name) }}"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    required>
            </div>

            <!-- Permissions Select -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Permissions</label>
                <div class="grid grid-cols-2 gap-3 mt-2">
                    @foreach ($permissions as $permission)
                        <div class="flex items-center space-x-2">
                            <input type="checkbox" name="permissions[]" id="permission_{{ $permission->id }}"
                                value="{{ $permission->id }}"
                                class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
                                {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}>
                            <label for="permission_{{ $permission->id }}" class="text-sm text-gray-700">
                                {{ $permission->name }}
                            </label>
                        </div>
                    @endforeach

                </div>
            </div>

            <!-- Buttons -->
            <div class="flex justify-end">
                <a href="{{ route('users.index') }}"
                    class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-gray-700 uppercase transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25">
                    {{ __('Cancel') }}
                </a>

                <x-primary-button class="ms-3">
                    {{ __('Save') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
