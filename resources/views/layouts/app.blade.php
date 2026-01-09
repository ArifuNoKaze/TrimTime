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
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;500;600;700&display=swap');
            .font-instrument { font-family: 'Instrument Sans', sans-serif; }
        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset
            @if (session('success'))
                <div id="global-alert" 
                    class="fixed inset-0 z-[9999] flex items-center justify-center pointer-events-none animate-fade-in">
                    <div class="bg-[#d4af37] text-black px-8 py-6 rounded-3xl font-black uppercase tracking-[0.2em] shadow-[0_0_50px_rgba(212,175,55,0.6)] flex flex-col items-center gap-4 border-4 border-black/10 pointer-events-auto transform transition-all scale-110">
                        {{-- Icon Centang Besar --}}
                        <div class="bg-black rounded-full p-3 shadow-lg">
                            <svg class="w-10 h-10 text-[#d4af37]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        
                        {{-- Teks Pesan --}}
                        <span class="text-xl text-center">{{ session('success') }}</span>
                    </div>
                </div>

                <script>
                    setTimeout(() => {
                        const alert = document.getElementById('global-alert');
                        if(alert) {
                            alert.style.transition = "opacity 0.5s ease";
                            alert.style.opacity = "0";
                            setTimeout(() => alert.remove(), 500);
                        }
                    }, 4000);
                </script>

                <style>
                    @keyframes fadeIn {
                        from { opacity: 0; transform: scale(0.9); }
                        to { opacity: 1; transform: scale(1); }
                    }
                    .animate-fade-in {
                        animation: fadeIn 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards;
                    }
                </style>
            @endif
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
