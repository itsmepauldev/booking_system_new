<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800 leading-tight">
            {{ __('Edit Booking') }}
        </h2>
    </x-slot>

    <div class="py-10 bg-gray-100 min-h-screen text-gray-800">
        <div class="w-full max-w-2xl mx-auto px-6 bg-white p-8 rounded-lg shadow border border-gray-200 space-y-6">

            @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-4 rounded border border-red-300">
                    <ul class="list-disc list-inside text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('bookings.update', $booking->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Title -->
                <div>
                    <label class="block mb-2 text-sm font-medium">Title</label>
                    <input type="text" name="title" value="{{ old('title', $booking->title) }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Description -->
                <div>
                    <label class="block mb-2 text-sm font-medium mt-4">Description</label>
                    <textarea name="description" rows="3"
                        class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500">{{ old('description', $booking->description) }}</textarea>
                </div>

                <!-- Date -->
                <div>
                    <label class="block mb-2 text-sm font-medium mt-4">Date</label>
                    <input type="date" name="date" value="{{ old('date', $booking->date) }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Time -->
                <div>
                    <label class="block mb-2 text-sm font-medium mt-4">Time</label>
                    <input type="time" name="time" value="{{ old('time', $booking->time) }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Actions -->
                <div class="pt-6 flex items-center gap-4">
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded shadow transition">
                        💾 Update Booking
                    </button>
                    <a href="{{ route('bookings.index') }}" class="text-gray-600 hover:text-gray-900 underline text-sm">
                        Cancel
                    </a>
                </div>

            </form>
        </div>
    </div>
</x-app-layout>