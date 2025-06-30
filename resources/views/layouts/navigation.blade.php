<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    <div class="flex items-center justify-between h-16">
        <!-- Left: Logo -->
        <div class="flex items-center space-x-6">
            <div class="shrink-0">
                <a href="{{ route('dashboard') }}">
                    <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                </a>
            </div>

            <!-- Navigation Links -->
            <div class="hidden sm:flex items-center space-x-4">
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-nav-link>

                @auth
                    @if(auth()->user()->role === 'admin')
                        <x-nav-link :href="route('admin.vm-orders.index')" :active="request()->routeIs('admin.vm-orders.*')">
                            {{ __('Verify VM Orders') }}
                        </x-nav-link>
                        <x-nav-link :href="route('admin.students.index')" :active="request()->routeIs('admin.students.*')">
                            {{ __('Verify Students') }}
                        </x-nav-link>
                    @elseif(auth()->user()->role === 'student')
                        <x-nav-link :href="route('vm-orders.index')" :active="request()->routeIs('vm-orders.*')">
                            {{ __('Order VM') }}
                        </x-nav-link>
                    @endif
                @endauth
            </div>
        </div>

        <!-- Right: User Dropdown -->
        <div class="hidden sm:flex sm:items-center">
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                        <div>{{ Auth::user()->name }}</div>
                        <div class="ms-1">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <x-dropdown-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-dropdown-link>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>
        </div>
    </div>

</div>