<x-guest-layout>
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-3/4 h-3/4 bg-yellow-600/20 blur-[100px] rounded-full -z-10 pointer-events-none"></div>

    <div class="relative w-full sm:max-w-md bg-neutral-900/90 border border-neutral-800 rounded-2xl shadow-[0_0_50px_-12px_rgba(234,179,8,0.25)] backdrop-blur-sm overflow-hidden">
        
        <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-yellow-500 to-transparent opacity-75"></div>

        <div class="px-8 py-8">
            <div class="mb-6 text-center">
                <h2 class="text-2xl font-bold tracking-wide text-white uppercase">
                    Join the <span class="text-yellow-500">Club</span>
                </h2>
                <p class="mt-2 text-xs text-neutral-400 font-medium">
                    Create your client profile
                </p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf

                <!-- Name -->
                <div class="relative group">
                    <x-input-label for="name" :value="__('Full Name')" class="text-xs uppercase tracking-wide text-neutral-500 mb-1 ml-1" />
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-neutral-500 group-focus-within:text-yellow-500 transition-colors" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </div>
                        <x-text-input
                            id="name"
                            type="text"
                            name="name"
                            :value="old('name')"
                            required autofocus
                            placeholder="John Doe"
                            class="block w-full pl-10 pr-4 py-2.5 bg-neutral-950/50 border border-neutral-700 rounded-lg text-gray-200 placeholder-neutral-600 focus:border-yellow-500 focus:ring-1 focus:ring-yellow-500 transition-all sm:text-sm"
                        />
                    </div>
                    <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-400 text-xs" />
                </div>

                <!-- Email -->
                <div class="relative group">
                    <x-input-label for="email" :value="__('Email')" class="text-xs uppercase tracking-wide text-neutral-500 mb-1 ml-1" />
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-neutral-500 group-focus-within:text-yellow-500 transition-colors" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0z" />
                            </svg>
                        </div>
                        <x-text-input
                            id="email"
                            type="email"
                            name="email"
                            :value="old('email')"
                            required
                            placeholder="mail@example.com"
                            class="block w-full pl-10 pr-4 py-2.5 bg-neutral-950/50 border border-neutral-700 rounded-lg text-gray-200 placeholder-neutral-600 focus:border-yellow-500 focus:ring-1 focus:ring-yellow-500 transition-all sm:text-sm"
                        />
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-400 text-xs" />
                </div>

                <!-- Password -->
                <div class="relative group">
                    <x-input-label for="password" :value="__('Password')" class="text-xs uppercase tracking-wide text-neutral-500 mb-1 ml-1" />
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-neutral-500 group-focus-within:text-yellow-500 transition-colors" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6z" />
                            </svg>
                        </div>
                        <x-text-input
                            id="password"
                            type="password"
                            name="password"
                            required
                            placeholder="••••••••"
                            class="block w-full pl-10 pr-4 py-2.5 bg-neutral-950/50 border border-neutral-700 rounded-lg text-gray-200 placeholder-neutral-600 focus:border-yellow-500 focus:ring-1 focus:ring-yellow-500 transition-all sm:text-sm"
                        />
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-400 text-xs" />
                </div>

                <!-- Confirm Password -->
                <div class="relative group">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-xs uppercase tracking-wide text-neutral-500 mb-1 ml-1" />
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-neutral-500 group-focus-within:text-yellow-500 transition-colors" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4" />
                            </svg>
                        </div>
                        <x-text-input
                            id="password_confirmation"
                            type="password"
                            name="password_confirmation"
                            required
                            placeholder="••••••••"
                            class="block w-full pl-10 pr-4 py-2.5 bg-neutral-950/50 border border-neutral-700 rounded-lg text-gray-200 placeholder-neutral-600 focus:border-yellow-500 focus:ring-1 focus:ring-yellow-500 transition-all sm:text-sm"
                        />
                    </div>
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-400 text-xs" />
                </div>

                <div class="flex items-center justify-between mt-6">
                    <a href="{{ route('login') }}" class="text-sm text-neutral-500 hover:text-yellow-500 transition">
                        Already registered?
                    </a>

                    <button type="submit"
                        class="inline-flex items-center px-6 py-2.5 bg-gradient-to-r from-yellow-600 to-yellow-500 rounded-lg font-bold text-xs text-black uppercase tracking-widest hover:from-yellow-500 hover:to-yellow-400 transition shadow-lg shadow-yellow-500/20">
                        Register
                    </button>
                </div>
            </form>
        </div>

        <div class="h-1.5 w-full bg-neutral-800 flex">
            <div class="h-full w-1/3 bg-neutral-700"></div>
            <div class="h-full w-1/3 bg-yellow-600"></div>
            <div class="h-full w-1/3 bg-red-800/20"></div>
        </div>
    </div>
</x-guest-layout>
