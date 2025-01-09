<x-app-layout>
    <x-slot name="header">
        {{ __('Edit User') }}
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs">
        <form method="POST" action="{{ route('users.update', $user->id) }}">
            @csrf
            @method('PATCH')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">{{ __('Name') }}</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}"
                        class="form-input w-full @error('name') border-red-500 @enderror" required>
                    @error('name')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">{{ __('Email') }}</label>
                    <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}"
                        class="form-input w-full @error('email') border-red-500 @enderror" required>
                    @error('email')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="position" class="block text-sm font-medium text-gray-700">{{ __('Position') }}</label>
                    <input type="text" name="position" id="position" value="{{ old('position', $user->position) }}"
                        class="form-input w-full @error('position') border-red-500 @enderror">
                    @error('position')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="department"
                        class="block text-sm font-medium text-gray-700">{{ __('Department') }}</label>
                    <input type="text" name="department" id="department"
                        value="{{ old('department', $user->department) }}"
                        class="form-input w-full @error('department') border-red-500 @enderror">
                    @error('department')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700">{{ __('Status') }}</label>
                    <select name="status" id="status" class="form-select w-full @error('status') border-red-500 @enderror" required>
                        <option value="active" {{ old('status', $user->status) == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ old('status', $user->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                    @error('status')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">{{ __('Password') }}</label>
                    <input type="password" name="password" id="password"
                        class="form-input w-full @error('password') border-red-500 @enderror">
                    @error('password')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="password_confirmation"
                        class="block text-sm font-medium text-gray-700">{{ __('Confirm Password') }}</label>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                        class="form-input w-full @error('password_confirmation') border-red-500 @enderror">
                    @error('password_confirmation')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="mt-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    {{ __('Update') }}
                </button>
                <a href="{{ route('users.index') }}" class="text-gray-600 hover:underline">{{ __('Cancel') }}</a>
            </div>
        </form>
    </div>
</x-app-layout>
