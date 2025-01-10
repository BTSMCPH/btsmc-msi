<x-app-layout>
    <x-slot name="header">
        {{ __('Edit Account') }}
    </x-slot>

    <section class="p-4 space-y-6 bg-white rounded-lg shadow-xs">
        <header>
            <h2 class="text-lg font-medium text-gray-900">{{ __('Edit Account') }}</h2>
            <p class="mt-1 text-sm text-gray-600">
                {{ __('Update the user details below.') }}
            </p>
        </header>

        <form method="POST" action="{{ route('users.update', $user->id) }}" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Two-column Grid Layout -->
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" name="name" type="text" class="block w-full mt-1" :value="old('name', $user->name)" required autofocus />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" name="email" type="email" class="block w-full mt-1" :value="old('email', $user->email)" required />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Position -->
                <div>
                    <x-input-label for="position" :value="__('Position')" />
                    <x-text-input id="position" name="position" type="text" class="block w-full mt-1" :value="old('position', $user->position)" />
                    <x-input-error :messages="$errors->get('position')" class="mt-2" />
                </div>

                <!-- Department -->
                <div>
                    <x-input-label for="department" :value="__('Department')" />
                    <x-text-input id="department" name="department" type="text" class="block w-full mt-1" :value="old('department', $user->department)" />
                    <x-input-error :messages="$errors->get('department')" class="mt-2" />
                </div>

                <!-- Password -->
                <div>
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" name="password" type="password" class="block w-full mt-1" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div>
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="block w-full mt-1" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <!-- Status -->
                <div>
                    <x-input-label for="status" :value="__('Status')" />
                    <x-select id="status" name="status" class="block w-full mt-1" required>
                        <option value="active" {{ old('status', $user->status) == 'active' ? 'selected' : '' }}>{{ __('Active') }}</option>
                        <option value="inactive" {{ old('status', $user->status) == 'inactive' ? 'selected' : '' }}>{{ __('Inactive') }}</option>
                    </x-select>
                    <x-input-error :messages="$errors->get('status')" class="mt-2" />
                </div>
            </div>

            <!-- Buttons -->
            <div class="flex justify-end">
                <a href="{{ route('users.index') }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                    {{ __('Cancel') }}
                </a>

                <x-primary-button class="ms-3">
                    {{ __('Save') }}
                </x-primary-button>
            </div>
        </form>
    </section>
</x-app-layout>
