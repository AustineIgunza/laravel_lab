<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('All Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <table class="min-w-full border border-gray-200 dark:border-gray-700">
                    <thead>
                        <tr class="bg-gray-100 dark:bg-gray-900">
                            <th class="border p-2 text-left">#</th>
                            <th class="border p-2 text-left">Name</th>
                            <th class="border p-2 text-left">Email</th>
                            <th class="border p-2 text-left">Role</th>
                            <th class="border p-2 text-left">Created</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(\App\Models\AddUser::all() as $index => $user)
                            <tr class="border-t">
                                <td class="p-2">{{ $index + 1 }}</td>
                                <td class="p-2">{{ $user->name }}</td>
                                <td class="p-2">{{ $user->email }}</td>
                                <td class="p-2">
                                    {{ \App\Models\SpotRoles::find($user->roleId)->roleName ?? '—' }}
                                </td>
                                <td class="p-2">{{ $user->created_at->format('Y-m-d') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
