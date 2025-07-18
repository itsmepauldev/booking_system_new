<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-10 bg-gray-100 min-h-screen text-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

            <!-- Success Message -->
            @if(session('success'))
                <div class="bg-green-100 text-green-800 p-4 rounded shadow">
                    {{ session('success') }}
                </div>
            @endif
            <div>
                <h2 class="text-xl font-semibold text-gray-800 leading-tight">
                    Rodriguez, Cyrine Joy
                </h2>
            </div>
            <!-- Dashboard Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- Total Users -->
                <div class="bg-blue-100 p-6 rounded-lg shadow-lg">
                    <h3 class="text-lg font-semibold text-blue-800">Total Users</h3>
                    <p class="text-4xl font-bold mt-2 text-blue-900">{{ $totalUsers }}</p>
                </div>

                <!-- Total Bookings -->
                <div class="bg-green-100 p-6 rounded-lg shadow-lg">
                    <h3 class="text-lg font-semibold text-green-800">Total Bookings</h3>
                    <p class="text-4xl font-bold mt-2 text-green-900">{{ $totalBookings }}</p>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>