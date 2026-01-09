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

                <h2 class="text-3xl font-bold tracking-wide text-white uppercase">
                    Barber <span class="text-yellow-500">Door</span>
                </h2>
                <p class="mt-2 text-sm text-neutral-400 font-medium">
                    Professional Grooming Access
                </p>
                <div class="mt-4 w-12 h-0.5 bg-yellow-600 mx-auto rounded-full"></div>
            </div>

            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

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
                            required autofocus
                            placeholder="mail@barberdoor.com"
                            class="block w-full pl-10 pr-4 py-3 bg-neutral-950/50 border border-neutral-700 rounded-lg text-gray-200 placeholder-neutral-600 focus:border-yellow-500 focus:ring-1 focus:ring-yellow-500 transition-all sm:text-sm"
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
                            class="block w-full pl-10 pr-4 py-3 bg-neutral-950/50 border border-neutral-700 rounded-lg text-gray-200 placeholder-neutral-600 focus:border-yellow-500 focus:ring-1 focus:ring-yellow-500 transition-all sm:text-sm"
                        />
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-400 text-xs" />
                </div>

                <div class="flex items-center justify-between">
                    <label class="inline-flex items-center text-sm text-neutral-400">
                        <input type="checkbox" name="remember" class="rounded bg-neutral-800 border-neutral-600 text-yellow-600 focus:ring-yellow-500">
                        <span class="ml-2">Remember me</span>
                    </label>

                    <a href="{{ route('password.request') }}" class="text-sm text-neutral-500 hover:text-yellow-500 transition">
                        Forgot?
                    </a>
                </div>

                <button type="submit"
                    class="w-full py-3 font-bold uppercase tracking-wider rounded-lg text-black bg-gradient-to-r from-yellow-600 via-yellow-500 to-yellow-600 hover:from-yellow-500 hover:to-yellow-500 transition shadow-lg">
                    Enter Shop
                </button>
            </form>
        </div>

        <div class="h-1.5 w-full bg-neutral-800 flex">
            <div class="h-full w-1/3 bg-yellow-600"></div>
            <div class="h-full w-1/3 bg-neutral-700"></div>
            <div class="h-full w-1/3 bg-red-800/20"></div>
        </div>
    </div>
</x-guest-layout>
