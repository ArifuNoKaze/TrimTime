<x-app-layout>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;500;600;700;800&display=swap');
        .font-instrument { font-family: 'Instrument Sans', sans-serif; }
        
        .bg-ultra-dark {
            background: radial-gradient(circle at 0% 0%, #1a1a1a 0%, #0f0f0f 50%, #0a0a0a 100%);
        }

        .bento-card {
            background: rgba(26, 26, 26, 0.4);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.03);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .bento-card:hover {
            border-color: rgba(212, 175, 55, 0.4);
            background: rgba(35, 35, 35, 0.6);
            transform: translateY(-8px);
            box-shadow: 0 30px 60px rgba(0,0,0,0.5);
        }

        .btn-gold {
            background: #d4af37;
            color: #121212;
            transition: all 0.3s ease;
        }

        .btn-gold:hover {
            background: #fdfdfc;
            transform: scale(1.02);
        }

        .service-image-container {
            mask-image: linear-gradient(to bottom, black 70%, transparent 100%);
            -webkit-mask-image: linear-gradient(to bottom, black 70%, transparent 100%);
        }
    </style>

    <div class="min-h-screen bg-ultra-dark font-instrument text-[#fdfdfc] py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            {{-- Header --}}
            <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-16 gap-6">
                <div>
                    <a href="{{ route('admin.dashboard') }}" class="text-[#d4af37] text-xs font-bold uppercase tracking-widest flex items-center gap-2 mb-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                        Back to Dashboard
                    </a>
                    <h1 class="text-5xl font-extrabold tracking-tighter text-white uppercase">
                        Service <span class="text-white/20">Menu</span>
                    </h1>
                </div>

                <a href="{{ route('admin.services.create') }}" 
                   class="btn-gold px-8 py-4 rounded-2xl text-xs font-black uppercase tracking-[0.2em] flex items-center gap-3">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="3" d="M12 4v16m8-8H4"></path></svg>
                    Add New Service
                </a>
            </div>

            {{-- Grid Service --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($services as $service)
                    <div class="bento-card rounded-[40px] flex flex-col group relative overflow-hidden">
                        
                        {{-- Image Section --}}
                        <div class="relative h-56 overflow-hidden bg-[#0a0a0a]">
                            @if($service->image)
                                {{-- PERBAIKAN: Pastikan path dimulai dengan storage/ --}}
                                <img src="{{ asset('storage/' . $service->image) }}" 
                                     alt="{{ $service->name }}" 
                                     class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 service-image-container">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-white/5 to-white/[0.02] flex items-center justify-center">
                                    <svg class="w-12 h-12 text-white/10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                </div>
                            @endif
                            
                            {{-- Action Overlay --}}
                            <div class="absolute top-4 right-4 flex gap-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300 z-20">
                                <a href="{{ route('admin.services.edit', $service) }}" class="p-3 bg-black/50 backdrop-blur-md rounded-xl text-white hover:text-[#d4af37] border border-white/10">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                </a>
                                <form action="{{ route('admin.services.destroy', $service) }}" method="POST" class="inline">
                                    @csrf @method('DELETE')
                                    <button onclick="return confirm('Hapus service ini?')" class="p-3 bg-black/50 backdrop-blur-md rounded-xl text-white hover:text-red-500 border border-white/10">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    </button>
                                </form>
                            </div>
                        </div>

                        {{-- Info Section --}}
                        <div class="p-8 pt-0 -mt-6 relative z-10">
                            <div class="bg-[#1a1a1a] p-6 rounded-[30px] border border-white/5 shadow-2xl">
                                <h3 class="text-xl font-black text-white uppercase tracking-tight mb-2 group-hover:text-[#d4af37] transition-colors">
                                    {{ $service->name }}
                                </h3>
                                
                                <div class="flex items-center gap-4 mb-6">
                                    <div class="flex items-center gap-2">
                                        <svg class="w-3 h-3 text-[#d4af37]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        <span class="text-[10px] font-black text-gray-500 uppercase tracking-widest">{{ $service->duration }} Min</span>
                                    </div>
                                    <span class="h-1 w-1 rounded-full bg-white/10"></span>
                                    <span class="text-[10px] font-black text-[#d4af37] uppercase tracking-widest italic">Luxury Treatment</span>
                                </div>

                                <div class="flex items-end justify-between border-t border-white/5 pt-6">
                                    <div>
                                        <p class="text-[9px] font-black text-gray-600 uppercase tracking-[0.2em] mb-1">Service Price</p>
                                        <p class="text-2xl font-black text-white">
                                            <span class="text-[#d4af37] text-xs mr-1 font-bold">IDR</span>{{ number_format($service->price, 0, ',', '.') }}
                                        </p>
                                    </div>
                                    {{-- Ganti <div> menjadi <a> dan tambahkan href --}}
                                    <a href="{{ route('admin.services.show', $service) }}" 
                                    class="h-10 w-10 rounded-full border border-white/10 flex items-center justify-center group-hover:bg-[#d4af37] group-hover:border-[#d4af37] transition-all duration-500 cursor-pointer">
                                        <svg class="w-5 h-5 text-white group-hover:text-[#121212] transition-colors" 
                                            fill="none" 
                                            stroke="currentColor" 
                                            viewBox="0 0 24 24">
                                            <path stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
</x-app-layout>