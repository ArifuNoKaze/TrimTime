<x-app-layout>
    <div class="min-h-screen bg-ultra-dark font-instrument text-[#fdfdfc] py-12">
        <div class="max-w-5xl mx-auto px-6">
            {{-- Back Button --}}
            <a href="{{ route('admin.services.index') }}" class="text-[#d4af37] text-xs font-bold uppercase tracking-widest flex items-center gap-2 mb-8 group w-fit">
                <svg class="w-4 h-4 transition-transform group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Back to List
            </a>

            <div class="bg-white/5 backdrop-blur-xl border border-white/5 rounded-[40px] overflow-hidden shadow-2xl">
                <div class="flex flex-col lg:flex-row">
                    
                    {{-- Image Section: Ukuran diperkecil dan dibuat ke samping pada layar besar --}}
                    <div class="lg:w-2/5 relative h-72 lg:h-auto overflow-hidden">
                        <img src="{{ asset('storage/' . $service->image) }}" class="w-full h-full object-cover">
                        {{-- Overlay Gradient --}}
                        <div class="absolute inset-0 bg-gradient-to-t lg:bg-gradient-to-r from-[#0a0a0a]/80 via-transparent to-transparent"></div>
                    </div>
                    
                    {{-- Info Section --}}
                    <div class="lg:w-3/5 p-8 lg:p-12">
                        <div class="flex flex-col h-full">
                            <div class="mb-2">
                                <span class="text-[#d4af37] text-[10px] font-black uppercase tracking-[0.3em]">Premium Service</span>
                                <h1 class="text-3xl lg:text-4xl font-black uppercase tracking-tighter mt-1">{{ $service->name }}</h1>
                            </div>

                            <div class="flex items-center gap-4 mb-6">
                                <div class="flex items-center gap-2 bg-white/5 px-3 py-1 rounded-full border border-white/10">
                                    <svg class="w-3 h-3 text-[#d4af37]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    <span class="text-[10px] font-bold text-gray-300 uppercase tracking-widest">{{ $service->duration }} Min</span>
                                </div>
                                <span class="text-gray-600 text-[10px] font-black uppercase tracking-widest italic">Luxury Treatment</span>
                            </div>
                            
                            <p class="text-gray-400 leading-relaxed mb-8 text-sm lg:text-base">
                                {{ $service->description ?? 'No description available for this premium service.' }}
                            </p>

                            <div class="mt-auto pt-6 border-t border-white/5 flex items-end justify-between">
                                <div>
                                    <p class="text-[9px] font-black text-gray-600 uppercase tracking-[0.2em] mb-1">Service Price</p>
                                    <p class="text-3xl font-black text-white">
                                        <span class="text-[#d4af37] text-sm mr-1">IDR</span>{{ number_format($service->price, 0, ',', '.') }}
                                    </p>
                                </div>
                                
                                {{-- Quick Action Button --}}
                                <a href="{{ route('admin.services.edit', $service) }}" class="bg-[#d4af37] hover:bg-white text-[#121212] px-6 py-3 rounded-xl text-[10px] font-black uppercase tracking-widest transition-all">
                                    Edit Service
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>