<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="min-h-screen bg-gray-100 text-gray-800 flex flex-col py-10">
        <div class="w-full px-4 sm:px-6 lg:px-8 flex flex-col flex-grow space-y-6">

            @if(session('success'))
                <div class="bg-green-100 text-green-800 p-4 rounded shadow border border-green-300">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Table container expanded to full width -->
            <div class="flex-grow overflow-x-auto bg-white p-6 rounded-lg shadow border border-gray-200 w-full">
                <table class="min-w-full text-left text-sm border border-gray-300">
                    <thead>
                        <tr class="bg-blue-100 text-blue-800 uppercase text-xs font-semibold tracking-wide">
                            <th class="px-6 py-3">Name</th>
                            <th class="px-6 py-3">Email</th>
                            <th class="px-6 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                            <tr class="border-t border-gray-200 hover:bg-gray-50">
                                <td class="px-6 py-4">{{ $user->name }}</td>
                                <td class="px-6 py-4">{{ $user->email }}</td>
                                <td class="px-6 py-4 flex flex-wrap gap-2">
                                    <a href="{{ route('users.edit', $user->id) }}"
                                        class="bg-yellow-400 hover:bg-yellow-500 text-black px-4 py-2 rounded transition duration-150">✏️
                                        Edit</a>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                        onsubmit="return confirm('Delete this user?');">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded transition duration-150">
                                            🗑️ Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-6 py-6 text-center text-gray-500">No users found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>