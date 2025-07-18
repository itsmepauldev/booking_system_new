<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800 leading-tight">
            Edit User
        </h2>
    </x-slot>

    <div class="py-10 bg-gray-100 min-h-screen text-gray-800">
        <div class="w-full max-w-2xl mx-auto px-6 bg-white p-8 rounded-lg shadow border border-gray-200 space-y-6">

            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div>
                    <label class="block mb-2 text-sm font-medium">Name</label>
                    <input type="text" name="name" value="{{ $user->name }}"
                        class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block mb-2 text-sm font-medium mt-4">Email</label>
                    <input type="email" name="email" value="{{ $user->email }}"
                        class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('email') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="pt-6 flex items-center gap-4">
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded shadow transition">
                        💾 Update
                    </button>
                    <a href="{{ route('users.index') }}" class="text-gray-600 hover:text-gray-900 underline text-sm">
                        Cancel
                    </a>
                </div>
            </form>

        </div>
    </div>
</x-app-layout>