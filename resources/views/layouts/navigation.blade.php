<nav x-data="{ open: false }" class="bg-[#1a1a1a] border-b border-neutral-800 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20"> <div class="flex">
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="group flex items-center gap-3">
                        <div class="h-10 w-10 bg-neutral-800 rounded-full flex items-center justify-center border border-yellow-600/30 shadow-lg shadow-yellow-900/10 group-hover:scale-105 transition-transform duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500 group-hover:rotate-12 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M14.121 14.121L19 19m-7-7l7-7m-7 7l-2.879 2.879M12 12L9.121 9.121m0 5.758a3 3 0 10-4.243 4.243 3 3 0 004.243-4.243zm0-5.758a3 3 0 10-4.243-4.243 3 3 0 004.243 4.243z" />
                            </svg>
                        </div>
                        <div class="flex flex-col">
                            <span class="text-white font-bold tracking-widest text-lg leading-none uppercase font-serif">
                                Barber<span class="text-yellow-500">Door</span>
                            </span>
                            <span class="text-[10px] text-neutral-400 tracking-[0.2em] leading-none mt-1">
                                PREMIUM CUTS
                            </span>
                        </div>
                    </a>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ms-12 sm:flex">
                    <a href="{{ route('dashboard') }}" 
                       class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 transition duration-150 ease-in-out {{ request()->routeIs('dashboard') ? 'border-yellow-500 text-white' : 'border-transparent text-neutral-400 hover:text-yellow-500 hover:border-yellow-500/30' }}">
                        {{ __('Dashboard') }}
                    </a>

                    @if(Auth::check() && Auth::user()->isCustomer())
                        <a href="{{ route('booking.history') }}"
                        class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium
                        {{ request()->routeIs('booking.history') ? 'border-yellow-500 text-white' : 'border-transparent text-neutral-400 hover:text-yellow-500' }}">
                            Riwayat Booking
                        </a>
                    @endif


                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center gap-3 px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-full text-neutral-300 hover:text-white hover:bg-neutral-800 transition ease-in-out duration-150 focus:outline-none">
                            
                            <div class="text-right hidden md:block">
                                <div class="text-xs text-neutral-400">Welcome,</div>
                                <div class="font-bold text-yellow-500">{{ Auth::user()->name }}</div>
                            </div>

                            <div class="h-9 w-9 rounded-full bg-neutral-700 flex items-center justify-center border border-neutral-600 text-white font-bold">
                                {{ substr(Auth::user()->name, 0, 1) }}
                            </div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4 text-neutral-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="bg-[#1a1a1a] border border-neutral-800 rounded-md ring-1 ring-black ring-opacity-5 py-1">
                            <x-dropdown-link :href="route('profile.edit')" class="text-neutral-300 hover:bg-neutral-800 hover:text-yellow-500">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                        class="text-neutral-300 hover:bg-neutral-800 hover:text-red-500"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </div>
                    </x-slot>
                </x-dropdown>
            </div>

            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-neutral-400 hover:text-yellow-500 hover:bg-neutral-800 focus:outline-none transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-[#151515] border-t border-neutral-800">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" 
                class="text-neutral-300 hover:text-yellow-500 hover:bg-neutral-800 hover:border-yellow-500 focus:text-yellow-500 focus:bg-neutral-800 focus:border-yellow-500">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>

            @if(Route::has('booking.index'))
            <x-responsive-nav-link :href="route('booking.index')" :active="request()->routeIs('booking.index')"
                class="text-neutral-300 hover:text-yellow-500 hover:bg-neutral-800 hover:border-yellow-500 focus:text-yellow-500 focus:bg-neutral-800 focus:border-yellow-500">
                {{ __('Riwayat Booking') }}
            </x-responsive-nav-link>
            @endif
        </div>

        <div class="pt-4 pb-1 border-t border-neutral-800 bg-[#121212]">
            <div class="px-4 flex items-center mb-4">
                 <div class="h-10 w-10 rounded-full bg-neutral-700 flex items-center justify-center border border-neutral-600 text-white font-bold mr-3">
                    {{ substr(Auth::user()->name, 0, 1) }}
                </div>
                <div>
                    <div class="font-medium text-base text-white">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-neutral-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')" class="text-neutral-400 hover:text-yellow-500 hover:bg-neutral-800">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            class="text-neutral-400 hover:text-red-500 hover:bg-neutral-800"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>