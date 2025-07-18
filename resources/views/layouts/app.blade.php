<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white shadow p-4 relative">
                <div class="max-w-7xl mx-auto flex justify-between items-center">
                    <span class="font-semibold">Welcome, {{ Auth::user()->name }}</span>

                    <!-- Notification Bell -->
                    <div class="relative">
                        <button id="notifBtn" class="relative focus:outline-none">
                            <!-- Bell Icon -->
                            <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6 6 0 10-12 0v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                            @if($bookings->count() > 0)
                                <span
                                    class="absolute -top-1 -right-1 inline-flex items-center justify-center px-1 py-0.5 text-xs font-bold text-white bg-red-600 rounded-full">
                                    {{ $bookings->count() }}
                                </span>
                            @endif
                        </button>

                        <!-- Notification Dropdown -->
                        <div id="notifDropdown"
                            class="hidden absolute right-0 mt-2 w-72 bg-white rounded shadow-lg z-50 border text-sm">
                            <div class="px-4 py-2 font-semibold border-b">Booking Notifications</div>
                            <ul class="max-h-60 overflow-y-auto">
                                @forelse($bookings as $booking)
                                    <li class="px-4 py-2 hover:bg-gray-100 border-b">
                                        <div class="font-medium">{{ $booking->title }}</div>
                                        <div class="text-gray-600">
                                            {{ \Carbon\Carbon::parse($booking->date)->format('F j, Y') }}
                                            at
                                            {{ \Carbon\Carbon::parse($booking->time)->format('g:i A') }}
                                        </div>

                                    </li>
                                @empty
                                    <li class="px-4 py-2 text-gray-500">No bookings yet.</li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
</body>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const notifBtn = document.getElementById('notifBtn');
        const notifDropdown = document.getElementById('notifDropdown');

        notifBtn.addEventListener('click', function (e) {
            e.stopPropagation();
            notifDropdown.classList.toggle('hidden');
        });

        document.addEventListener('click', function (e) {
            if (!notifDropdown.contains(e.target)) {
                notifDropdown.classList.add('hidden');
            }
        });
    });
</script>

</html>