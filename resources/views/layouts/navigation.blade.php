<nav x-data="{ open: false }" class="bg-white border-r border-gray-200 min-h-screen w-64 fixed">
    <!-- Logo -->
    <div class="h-16 flex items-center justify-center border-b">
        <a href="{{ route('dashboard') }}">
            <x-application-logo class="block h-10 w-auto fill-current text-gray-800" />
        </a>
    </div>

    <!-- Navigation Links -->
    <div class="px-4 py-6 space-y-4">
        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
            {{ __('Dashboard') }}
        </x-nav-link>

        <x-nav-link :href="route('users.index')" :active="request()->routeIs('users.index')">
            {{ __('Users') }}
        </x-nav-link>

        <x-nav-link :href="route('bookings.index')" :active="request()->routeIs('bookings.index')">
            {{ __('Booking') }}
        </x-nav-link>

        <x-nav-link :href="route('bookings.create')" :active="request()->routeIs('bookings.create')">
            {{ __('Add Booking') }}
        </x-nav-link>
    </div>

    <!-- Bottom User Info + Logout -->
    <div class="absolute bottom-0 w-full border-t p-4 text-sm">
        <div class="text-gray-800 font-semibold">{{ Auth::user()->name }}</div>
        <div class="text-gray-500 text-xs">{{ Auth::user()->email }}</div>

        <div class="mt-2 space-y-1">
            <x-nav-link :href="route('profile.edit')">
                {{ __('Profile') }}
            </x-nav-link>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-nav-link>
            </form>
        </div>
    </div>
</nav>