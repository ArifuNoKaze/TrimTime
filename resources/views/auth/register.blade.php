<x-guest-layout>
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-3/4 h-3/4 bg-yellow-600/20 blur-[100px] rounded-full -z-10 pointer-events-none"></div>

    <div class="relative w-full sm:max-w-md bg-neutral-900/90 border border-neutral-800 rounded-2xl shadow-[0_0_50px_-12px_rgba(234,179,8,0.25)] backdrop-blur-sm overflow-hidden">
        
        <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-yellow-500 to-transparent opacity-75"></div>

        <div class="px-8 py-8">
            <div class="mb-6 text-center">
                <h2 class="text-2xl font-bold tracking-widest text-white uppercase font-serif">
                    Join the <span class="text-yellow-500">Club</span>
                </h2>
                <p class="mt-2 text-xs text-neutral-400 font-medium">Create your client profile</p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf

                <div class="relative group">
                    <x-input-label for="name" :value="__('Full Name')" class="text-xs uppercase tracking-wide text-neutral-500 mb-1 ml-1" />
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-neutral-500 group-focus-within:text-yellow-500 transition-colors" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <x-text-input id="name" 
                            class="block w-full pl-10 pr-4 py-2.5 bg-neutral-950/50 border border-neutral-700 rounded-lg text-gray-200 placeholder-neutral-600 focus:border-yellow-500 focus:ring-1 focus:ring-yellow-500 focus:bg-neutral-900 transition-all duration-200 sm:text-sm" 
                            type="text" 
                            name="name" 
                            :value="old('name')" 
                            required autofocus autocomplete="name" 
                            placeholder="John Doe" />
                    </div>
                    <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-400 text-xs" />
                </div>

                <div class="relative group">
                    <x-input-label for="email" :value="__('Email')" class="text-xs uppercase tracking-wide text-neutral-500 mb-1 ml-1" />
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-neutral-500 group-focus-within:text-yellow-500 transition-colors" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                            </svg>
                        </div>
                        <x-text-input id="email" 
                            class="block w-full pl-10 pr-4 py-2.5 bg-neutral-950/50 border border-neutral-700 rounded-lg text-gray-200 placeholder-neutral-600 focus:border-yellow-500 focus:ring-1 focus:ring-yellow-500 focus:bg-neutral-900 transition-all duration-200 sm:text-sm" 
                            type="email" 
                            name="email" 
                            :value="old('email')" 
                            required autocomplete="username" 
                            placeholder="mail@example.com" />
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
                            class="block w-full pl-10 pr-4 py-2.5 bg-neutral-950/50 border border-neutral-700 rounded-lg text-gray-200 placeholder-neutral-600 focus:border-yellow-500 focus:ring-1 focus:ring-yellow-500 focus:bg-neutral-900 transition-all duration-200 sm:text-sm" 
                            type="password" 
                            name="password" 
                            required autocomplete="new-password" 
                            placeholder="••••••••" />
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-400 text-xs" />
                </div>

                <div class="relative group">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-xs uppercase tracking-wide text-neutral-500 mb-1 ml-1" />
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-neutral-500 group-focus-within:text-yellow-500 transition-colors" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        </div>
                        <x-text-input id="password_confirmation" 
                            class="block w-full pl-10 pr-4 py-2.5 bg-neutral-950/50 border border-neutral-700 rounded-lg text-gray-200 placeholder-neutral-600 focus:border-yellow-500 focus:ring-1 focus:ring-yellow-500 focus:bg-neutral-900 transition-all duration-200 sm:text-sm" 
                            type="password" 
                            name="password_confirmation" 
                            required autocomplete="new-password" 
                            placeholder="••••••••" />
                    </div>
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-400 text-xs" />
                </div>

                <div class="flex items-center justify-between mt-6">
                    <a class="underline text-sm text-neutral-500 hover:text-yellow-500 transition-colors duration-200" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <button type="submit" class="ml-3 inline-flex items-center px-6 py-2.5 bg-gradient-to-r from-yellow-600 to-yellow-500 border border-transparent rounded-lg font-bold text-xs text-black uppercase tracking-widest hover:from-yellow-500 hover:to-yellow-400 focus:bg-yellow-500 active:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 focus:ring-offset-neutral-900 transition ease-in-out duration-150 shadow-lg shadow-yellow-500/20">
                        {{ __('Register') }}
                    </button>
                </div>
            </form>
        </div>

        <div class="h-1.5 w-full bg-neutral-800 flex">
            <div class="h-full w-1/3 bg-neutral-700"></div>
            <div class="h-full w-1/3 bg-yellow-600"></div>
            <div class="h-full w-1/3 bg-red-800 opacity-20"></div>
        </div>
    </div>
</x-guest-layout>