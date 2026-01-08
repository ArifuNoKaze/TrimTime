<x-app-layout>
    <div class="min-h-screen bg-[#121212] pb-12">
        
        <div class="bg-[#1a1a1a] border-b border-neutral-800 pb-8 pt-8 rounded-b-[3rem] shadow-2xl relative overflow-hidden">
            <div class="absolute top-0 right-0 w-64 h-64 bg-yellow-600/10 blur-[80px] rounded-full pointer-events-none"></div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    
                    <div class="lg:col-span-2 bg-[#121212] border border-neutral-800 rounded-2xl p-6 flex flex-col sm:flex-row items-center sm:items-start gap-6 shadow-lg">
                        <div class="relative">
                            <div class="w-20 h-20 sm:w-24 sm:h-24 rounded-full bg-neutral-800 border-2 border-yellow-600 flex items-center justify-center text-3xl font-bold text-white shadow-[0_0_15px_rgba(212,175,55,0.3)]">
                                {{ substr(Auth::user()->name, 0, 1) }}
                            </div>
                            <div class="absolute bottom-0 right-0 w-6 h-6 bg-green-500 border-4 border-[#121212] rounded-full"></div>
                        </div>
                        
                        <div class="text-center sm:text-left flex-1">
                            <h2 class="text-2xl font-bold text-white">Halo, {{ Auth::user()->name }}</h2>
                            <p class="text-neutral-400 text-sm mt-1">{{ Auth::user()->email }}</p>
                            
                            <div class="mt-4 flex flex-wrap justify-center sm:justify-start gap-3">
                                <span class="px-3 py-1 bg-yellow-900/30 text-yellow-500 border border-yellow-700/50 rounded-full text-xs font-medium tracking-wide">
                                    MEMBER CLUB
                                </span>
                                <span class="px-3 py-1 bg-neutral-800 text-neutral-400 border border-neutral-700 rounded-full text-xs">
                                    Bergabung {{ Auth::user()->created_at->format('M Y') }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <a href="{{ route('booking.index') }}" class="group bg-neutral-800 hover:bg-neutral-700 border border-neutral-700 rounded-2xl p-4 flex flex-col justify-between transition-all duration-300 hover:-translate-y-1 cursor-pointer">
                            <div class="w-10 h-10 rounded-full bg-neutral-900 flex items-center justify-center text-white mb-2 group-hover:text-yellow-500 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-neutral-400 text-xs">Aktivitas</p>
                                <h3 class="text-white font-bold text-sm">Riwayat Booking</h3>
                            </div>
                        </a>

                        <div class="bg-gradient-to-br from-yellow-700 to-yellow-600 rounded-2xl p-4 flex flex-col justify-between shadow-lg shadow-yellow-900/20">
                            <div class="w-10 h-10 rounded-full bg-black/20 flex items-center justify-center text-white mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-yellow-100 text-xs opacity-80">Jadwal Anda</p>
                                <h3 class="text-white font-bold text-sm">
                                    {{ $upcomingBooking ? $upcomingBooking->schedule->date->format('d M') : 'Belum Ada' }}
                                </h3>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="mt-8">
                     <a href="#services-list" class="relative block w-full group overflow-hidden rounded-2xl">
                        <div class="absolute inset-0 bg-neutral-800 transition-colors group-hover:bg-neutral-700"></div>
                        <div class="relative px-6 py-8 flex items-center justify-between border border-yellow-600/30 rounded-2xl">
                            <div>
                                <h3 class="text-xl sm:text-2xl font-bold text-white group-hover:text-yellow-500 transition-colors">
                                    Booking Jadwal Baru
                                </h3>
                                <p class="text-neutral-400 text-sm mt-1">Siap untuk penampilan baru? Pilih layanan di bawah.</p>
                            </div>
                            <div class="h-12 w-12 bg-yellow-600 rounded-full flex items-center justify-center shadow-[0_0_20px_rgba(202,138,4,0.4)] group-hover:scale-110 transition-transform duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </div>
                        </div>
                    </a>
                </div>

            </div>
        </div>

        <div id="services-list" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-12">
            <div class="flex items-center justify-between mb-8">
                <h3 class="text-2xl font-bold text-[#fdfdfc]">Premium Services</h3>
                <div class="h-px bg-neutral-800 flex-1 ml-6"></div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                
                @foreach($services as $service)
                <div class="group bg-[#1a1a1a] border border-neutral-800 rounded-2xl overflow-hidden hover:border-yellow-600/50 transition-all duration-300 hover:shadow-[0_10px_30px_-10px_rgba(0,0,0,0.5)] flex flex-col">
                    
                    <div class="h-48 w-full overflow-hidden relative">
                        <img src="{{ asset('storage/' . $service->image) }}" 
                            alt="{{ $service->name }}"
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 filter brightness-75 group-hover:brightness-100">
                        
                        <div class="absolute top-4 right-4 bg-black/70 backdrop-blur-md px-3 py-1 rounded-full border border-yellow-600/30">
                            <span class="text-yellow-500 font-bold text-sm">
                                Rp {{ number_format($service->price, 0, ',', '.') }}
                            </span>
                        </div>
                    </div>

                    <div class="p-6 flex-1 flex flex-col">
                        <h4 class="text-lg font-bold text-white mb-2">{{ $service->name }}</h4>
                        <p class="text-neutral-400 text-sm leading-relaxed mb-6 flex-1">
                            {{ Str::limit($service->description ?? 'Layanan potong rambut premium dengan styling profesional.', 80) }}
                        </p>

                        <a href="{{ route('booking.index', ['service_id' => $service->id]) }}" 
                           class="w-full block text-center py-3 rounded-lg bg-neutral-800 text-white font-medium border border-neutral-700 hover:bg-yellow-600 hover:text-black hover:border-yellow-600 transition-all duration-200">
                            Pilih Layanan
                        </a>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</x-app-layout>