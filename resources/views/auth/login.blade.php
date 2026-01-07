<x-guest-layout>
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-3/4 h-3/4 bg-yellow-600/20 blur-[100px] rounded-full -z-10 pointer-events-none"></div>

    <div class="relative w-full sm:max-w-md bg-neutral-900/90 border border-neutral-800 rounded-2xl shadow-[0_0_50px_-12px_rgba(234,179,8,0.25)] backdrop-blur-sm overflow-hidden">
        
        <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-yellow-500 to-transparent opacity-75"></div>

        <div class="px-8 py-10">
            <div class="mb-8 text-center">
                <div class="mx-auto h-16 w-16 bg-neutral-800 rounded-full flex items-center justify-center border border-yellow-500/30 shadow-lg shadow-yellow-500/10 mb-4 group hover:scale-110 transition-transform duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-yellow-500 group-hover:rotate-12 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.121 14.121L19 19m-7-7l7-7m-7 7l-2.879 2.879M12 12L9.121 9.121m0 5.758a3 3 0 10-4.243 4.243 3 3 0 004.243-4.243zm0-5.758a3 3 0 10-4.243-4.243 3 3 0 004.243 4.243z" />
                    </svg>
                </div>

                <h2 class="text-3xl font-bold tracking-widest text-white uppercase font-serif">
                    Barber <span class="text-yellow-500">Door</span>
                </h2>
                <p class="mt-2 text-sm text-neutral-400 font-medium">Professional Grooming Access</p>
                <div class="mt-4 w-12 h-0.5 bg-yellow-600 mx-auto rounded-full"></div>
            </div>

            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <div class="relative group">
                    <x-input-label for="email" :value="__('Email')" class="text-xs uppercase tracking-wide text-neutral-500 mb-1 ml-1" />
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-neutral-500 group-focus-within:text-yellow-500 transition-colors" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                            </svg>
                        </div>
                        <x-text-input id="email" 
                            class="block w-full pl-10 pr-4 py-3 bg-neutral-950/50 border border-neutral-700 rounded-lg text-gray-200 placeholder-neutral-600 focus:border-yellow-500 focus:ring-1 focus:ring-yellow-500 focus:bg-neutral-900 transition-all duration-200 sm:text-sm" 
                            type="email" 
                            name="email" 
                            :value="old('email')" 
                            required autofocus autocomplete="username" 
                            placeholder="mail@barberdoor.com" />
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-400 text-xs" />
                </div>

                <div class="relative group">
                    <x-input-label for="password" :value="__('Password')" class="text-xs uppercase tracking-wide text-neutral-500 mb-1 ml-1" />
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-neutral-500 group-focus-within:text-yellow-500 transition-colors" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </div>
                        <x-text-input id="password" 
                            class="block w-full pl-10 pr-4 py-3 bg-neutral-950/50 border border-neutral-700 rounded-lg text-gray-200 placeholder-neutral-600 focus:border-yellow-500 focus:ring-1 focus:ring-yellow-500 focus:bg-neutral-900 transition-all duration-200 sm:text-sm"
                            type="password" 
                            name="password" 
                            required autocomplete="current-password" 
                            placeholder="••••••••" />
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-400 text-xs" />
                </div>

                <div class="flex items-center justify-between mt-4">
                    <label for="remember_me" class="inline-flex items-center cursor-pointer group">
                        <input id="remember_me" type="checkbox" 
                            class="rounded bg-neutral-800 border-neutral-600 text-yellow-600 shadow-sm focus:ring-yellow-500 focus:ring-offset-neutral-900 cursor-pointer transition-colors" 
                            name="remember">
                        <span class="ms-2 text-sm text-neutral-400 group-hover:text-neutral-300 transition-colors">{{ __('Remember me') }}</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a class="text-sm text-neutral-500 hover:text-yellow-500 transition-colors duration-200" href="{{ route('password.request') }}">
                            {{ __('Forgot?') }}
                        </a>
                    @endif
                </div>

                <div class="mt-8">
                    <button type="submit" class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-bold rounded-lg text-black bg-gradient-to-r from-yellow-600 via-yellow-500 to-yellow-600 hover:from-yellow-500 hover:to-yellow-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 focus:ring-offset-neutral-900 shadow-[0_0_20px_-5px_rgba(234,179,8,0.4)] transition-all duration-300 transform hover:-translate-y-0.5 uppercase tracking-wider">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <svg class="h-5 w-5 text-yellow-800 group-hover:text-yellow-900" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                            </svg>
                        </span>
                        {{ __('Enter Shop') }}
                    </button>
                </div>
            </form>
        </div>
        
        <div class="h-1.5 w-full bg-neutral-800 flex">
            <div class="h-full w-1/3 bg-yellow-600"></div>
            <div class="h-full w-1/3 bg-neutral-700"></div>
            <div class="h-full w-1/3 bg-red-800 opacity-20"></div> </div>
    </div>
</x-guest-layout>