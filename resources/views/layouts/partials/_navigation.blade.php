<nav class="bg-gray-900">
    <div class="px-4 sm:px6 md:container mx-auto">
        <div class="flex justify-between items-center h-16">
            <a href="{{ url('/') }}" class="text-white text-xl font-semibold">
                {{ config('app.name', 'Birdboard') }}
            </a>

            <div class="flex items-center">
                @guest
                <div class="ml-10 flex items-baseline">
                    <a href="{{ route('login') }}"
                        class="px-3 py-2 rounded-md text-sm font-medium text-white hover:bg-gray-800 focus:outline-none focus:text-white focus:bg-gray-700">
                        {{ __('Login') }}
                    </a>
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                        class="ml-4 px-3 py-2 rounded-md text-sm font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">
                        {{ __('Register') }}
                    </a>
                    @endif
                </div>
                @else
                <button
                    class="p-1 ml-4 border-2 border-transparent text-gray-400 rounded-full hover:text-white focus:outline-none focus:text-white focus:bg-gray-700"
                    aria-label="Notifications">

                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                </button>
                {{-- Profile dropdown --}}
                <div class="ml-4 relative" x-data="{isOpen: false }">
                    <div>
                        <button @click="isOpen = !isOpen" @click.away="isOpen = false"
                            class="max-w-xs flex items-center text-sm rounded-full text-white focus:outline-none focus:shadow-solid"
                            id="user-menu" aria-label="User menu" aria-haspopup="true">
                            <img class="h-8 w-8 rounded-full"
                                src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                alt="">
                        </button>
                    </div>
                    <div class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg" x-show="isOpen"
                        @keydown.escape.window="isOpen = false"
                        x-transition:enter="transition transform origin-top-right ease-out duration-200"
                        x-transition:enter-start="opacity-0 scale-75" x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition transform origin-top-right ease-out duration-200"
                        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-75">
                        <div class="py-1 rounded-md bg-white shadow-xs" role="menu" aria-orientation="vertical"
                            aria-labelledby="user-menu">
                            <a href="#"
                                class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"
                                role="menuitem">Your Profile</a>
                            <a href="#"
                                class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"
                                role="menuitem">Settings</a>
                            <a href="{{ route('logout') }}"
                                class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"
                                role="menuitem" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </div>
                </div>
                @endguest
            </div>
        </div>
    </div>
</nav>