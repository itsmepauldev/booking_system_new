<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800 leading-tight">
            {{ __('Bookings') }}
        </h2>
    </x-slot>

    <div class="min-h-screen bg-gray-100 text-gray-800 py-10 flex flex-col">
        <div class="w-full px-4 sm:px-6 lg:px-8 flex flex-col flex-grow space-y-6">

            @if(session('success'))
                <div class="bg-green-100 text-green-800 p-4 rounded shadow border border-green-300">
                    {{ session('success') }}
                </div>
            @endif

            <div class="flex-grow overflow-x-auto bg-white p-6 rounded-lg shadow border border-gray-200 w-full">
                <table class="min-w-full text-left text-sm border border-gray-300">
                    <thead>
                        <tr class="bg-blue-100 text-blue-800 uppercase text-xs font-semibold tracking-wide">
                            <th class="px-6 py-3">Title</th>
                            <th class="px-6 py-3">Description</th>
                            <th class="px-6 py-3">Date</th>
                            <th class="px-6 py-3">Time</th>
                            <th class="px-6 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($bookings as $booking)
                            <tr class="border-t border-gray-200 hover:bg-gray-50">
                                <td class="px-6 py-4">{{ $booking->title }}</td>
                                <td class="px-6 py-4">{{ $booking->description }}</td>
                                <td class="px-6 py-4">{{ $booking->date }}</td>
                                <td class="px-6 py-4">{{ $booking->time }}</td>
                                <td class="px-6 py-4 flex flex-wrap gap-2">
                                    <a href="{{ route('bookings.edit', $booking->id) }}"
                                        class="bg-yellow-400 hover:bg-yellow-500 text-black px-4 py-2 rounded shadow transition">
                                        ✏️ Edit
                                    </a>
                                    <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST"
                                        onsubmit="return confirm('Delete this booking?');">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded shadow transition">
                                            🗑️ Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-6 text-center text-gray-500">
                                    No bookings found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>