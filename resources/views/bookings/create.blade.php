<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800 leading-tight">
            {{ __('Add Booking') }}
        </h2>
    </x-slot>

    <div class="py-10 bg-gray-100 min-h-screen text-gray-800">
        <div class="w-full max-w-2xl mx-auto px-6">
            <div class="bg-white p-8 rounded-lg shadow border border-gray-200">
                <form method="POST" action="{{ route('bookings.store') }}">
                    @csrf

                    <!-- Title -->
                    <div class="mb-4">
                        <label for="title" class="block text-sm font-medium mb-1">Title</label>
                        <input id="title" name="title" type="text" required
                            class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500">
                        <x-input-error :messages="$errors->get('title')" class="mt-2 text-red-500 text-sm" />
                    </div>

                    <!-- Description -->
                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium mb-1">Description</label>
                        <textarea id="description" name="description" required rows="3"
                            class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500"></textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2 text-red-500 text-sm" />
                    </div>

                    <!-- Date -->
                    <div class="mb-4">
                        <label for="date" class="block text-sm font-medium mb-1">Date</label>
                        <input id="date" name="date" type="date" required
                            class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500">
                        <x-input-error :messages="$errors->get('date')" class="mt-2 text-red-500 text-sm" />
                    </div>

                    <!-- Time -->
                    <div class="mb-6">
                        <label for="time" class="block text-sm font-medium mb-1">Time</label>
                        <input id="time" name="time" type="time" required
                            class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500">
                        <x-input-error :messages="$errors->get('time')" class="mt-2 text-red-500 text-sm" />
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded shadow transition">
                        ➕ Save Booking
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>