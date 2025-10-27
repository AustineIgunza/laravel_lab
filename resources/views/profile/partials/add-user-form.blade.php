<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('User Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Add a new user's information and assign a role.") }}
        </p>
    </header>

    <form method="post" action="{{ route('addUser.create') }}" class="mt-6 space-y-6">
        @csrf

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" required autofocus />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" required />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>

        <div>
            <x-input-label for="roleId" :value="__('Role')" />
            <x-select-input id="roleId" name="roleId" class="mt-1 block w-full" required>
                @foreach(\App\Models\SpotRoles::all() as $role)
                    <option value="{{ $role->roleId }}">{{ $role->roleName }}</option>
                @endforeach
            </x-select-input>
            <x-input-error class="mt-2" :messages="$errors->get('roleId')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'User added successfully!')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
