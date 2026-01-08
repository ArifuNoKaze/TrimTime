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
            transform: translateY(-4px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.4);
        }

        ::-webkit-scrollbar { width: 5px; }
        ::-webkit-scrollbar-track { background: #0a0a0a; }
        ::-webkit-scrollbar-thumb { background: #333; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #d4af37; }
    </style>

    <div class="min-h-screen bg-ultra-dark font-instrument text-[#fdfdfc] py-12" 
         x-data="{ openDetail: false, activeBooking: {}, isEditing: false }">
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            {{-- Header --}}
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-12 gap-6">
                <div>
                    <div class="flex items-center gap-2 mb-2">
                        <span class="h-[2px] w-8 bg-[#d4af37]"></span>
                        <span class="text-[#d4af37] text-xs font-black uppercase tracking-[0.3em]">Executive Panel</span>
                    </div>
                    <h1 class="text-4xl md:text-5xl font-extrabold tracking-tighter text-white">
                        Master <span class="text-white/20">Control</span>
                    </h1>
                </div>
                
                <div class="flex items-center gap-4 bg-white/5 p-2 rounded-full border border-white/5 shadow-inner">
                    <div class="px-5 py-2 text-sm font-bold text-gray-400 italic">
                        {{ now()->format('l, d F') }}
                    </div>
                    <div class="bg-[#d4af37] text-[#121212] px-5 py-2 rounded-full text-sm font-black shadow-lg shadow-[#d4af37]/20">
                        {{ now()->format('H:i') }}
                    </div>
                </div>
            </div>

            {{-- Bento Stats --}}
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-12">
                <div class="md:col-span-2 bento-card p-8 rounded-3xl relative overflow-hidden group">
                    <div class="absolute -right-8 -bottom-8 text-white/5 group-hover:text-[#d4af37]/10 transition-colors duration-700">
                        <svg class="w-48 h-48" fill="currentColor" viewBox="0 0 24 24"><path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                    </div>
                    <div class="relative z-10 flex flex-col justify-between h-full">
                        <div>
                            <span class="text-[10px] font-bold tracking-[0.4em] text-[#d4af37] uppercase">Growth Monitor</span>
                            <h3 class="text-2xl font-bold mt-1 text-white/90 uppercase tracking-tight">Pelanggan Terdaftar</h3>
                        </div>
                        <div class="mt-12 flex items-end gap-3">
                            <span class="text-7xl font-black text-white leading-none tracking-tighter">{{ $totalUsers }}</span>
                        </div>
                    </div>
                </div>

                <div class="bento-card p-6 rounded-3xl flex flex-col justify-between group">
                    <div class="w-12 h-12 bg-white/5 rounded-2xl flex items-center justify-center text-[#d4af37] border border-white/5">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.121 14.121L19 19m-7-7l7-7m-7 7l-2.879 2.879M12 12L9.121 9.121m0 5.758a3 3 0 11-4.243-4.243 3 3 0 014.243 4.243zm0-5.758a3 3 0 11-4.243-4.243 3 3 0 014.243 4.243z"></path></svg>
                    </div>
                    <div>
                        <span class="text-4xl font-black text-white block">{{ $totalServices }}</span>
                        <span class="text-[10px] font-bold text-gray-500 uppercase tracking-widest">Layanan Aktif</span>
                    </div>
                    <a href="{{ route('admin.services.index') }}" class="text-[10px] font-bold text-[#d4af37] underline decoration-2 underline-offset-4 tracking-tighter hover:text-white uppercase">Manage Service</a>
                </div>

                <div class="bg-[#d4af37] p-6 rounded-3xl flex flex-col justify-between shadow-[0_15px_30px_rgba(212,175,55,0.2)] group relative overflow-hidden">
                    <div class="w-12 h-12 bg-[#121212] rounded-2xl flex items-center justify-center text-[#d4af37] shadow-xl">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"/></svg>
                    </div>
                    <div class="mt-4">
                        <span class="text-5xl font-black text-[#121212] block tracking-tighter">{{ $totalBookings }}</span>
                        <span class="text-[10px] font-extrabold text-[#121212]/60 uppercase tracking-widest">Total Reservasi</span>
                    </div>
                    <a href="{{ route('admin.schedules.index') }}" class="text-[10px] font-bold text-[#121212] underline decoration-2 underline-offset-4 tracking-tighter hover:text-white uppercase">Cek Jadwal</a>
                </div>
            </div>

            {{-- Table --}}
            <div class="bento-card rounded-3xl shadow-2xl overflow-visible">
                <div class="p-8 border-b border-white/5">
                    <h2 class="text-xl font-bold text-white tracking-tight uppercase">Recent Appointments</h2>
                    <p class="text-xs text-gray-500 mt-1">Pantau transaksi secara real-time.</p>
                </div>
                
                <div class="overflow-visible"> 
                    <table class="w-full text-left">
                        <thead>
                            <tr class="text-[10px] font-black uppercase tracking-[0.2em] text-gray-500 bg-white/[0.02]">
                                <th class="px-8 py-5">Client</th>
                                <th class="px-8 py-5">Treatment</th>
                                <th class="px-8 py-5">Schedule</th>
                                <th class="px-8 py-5 text-right">Status Control</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/5">
                            @foreach($latestBookings as $booking)
                            <tr 
                                @click="openDetail = true; isEditing = false; activeBooking = { 
                                    id: '{{ $booking->id }}',
                                    name: '{{ $booking->user->name }}', 
                                    email: '{{ $booking->user->email }}',
                                    service: '{{ $booking->service->name }}',
                                    price: 'Rp {{ number_format($booking->service->price, 0, ',', '.') }}',
                                    date: '{{ \Carbon\Carbon::parse($booking->schedule->date)->format('l, d F Y') }}',
                                    time: '{{ \Carbon\Carbon::parse($booking->schedule->start_time)->format('H:i') }} WIB',
                                    status: '{{ $booking->status }}'
                                }"
                                class="hover:bg-white/[0.03] transition-colors group cursor-pointer"
                            >
                                <td class="px-8 py-6">
                                    <div class="flex items-center gap-4">
                                        <div class="h-12 w-12 rounded-2xl bg-gradient-to-br from-[#333] to-[#111] flex items-center justify-center border border-white/10 group-hover:border-[#d4af37]/40">
                                            <span class="text-[#d4af37] font-black text-xs uppercase">{{ substr($booking->user->name, 0, 2) }}</span>
                                        </div>
                                        <div>
                                            <div class="font-bold text-white text-sm group-hover:text-[#d4af37]">{{ $booking->user->name }}</div>
                                            <div class="text-[10px] text-gray-500">{{ $booking->user->email }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-8 py-6">
                                    <div class="inline-flex items-center gap-2 bg-white/5 px-3 py-1.5 rounded-full border border-white/5">
                                        <div class="w-1.5 h-1.5 rounded-full bg-[#d4af37]"></div>
                                        <span class="text-xs font-bold text-gray-300">{{ $booking->service->name }}</span>
                                    </div>
                                </td>
                                <td class="px-8 py-6">
                                    <div class="text-sm font-bold text-white">{{ \Carbon\Carbon::parse($booking->schedule->date)->format('D, d M') }}</div>
                                    <div class="text-[10px] text-[#d4af37] font-black tracking-widest mt-1">{{ \Carbon\Carbon::parse($booking->schedule->start_time)->format('H:i') }} WIB</div>
                                </td>
                                <td class="px-8 py-6 text-right" x-data="{ showMenu: false }" @click.stop>
                                    <div class="relative inline-block text-left">
                                        <button @click="showMenu = !showMenu" 
                                            class="inline-flex items-center gap-2 bg-white/5 px-4 py-2 rounded-xl border border-white/10 hover:bg-white/10 transition-all">
                                            <span class="text-[10px] font-black uppercase tracking-widest 
                                                @if($booking->status == 'pending') text-yellow-500 
                                                @elseif($booking->status == 'confirmed') text-blue-400 
                                                @elseif($booking->status == 'completed') text-green-500 
                                                @else text-red-500 @endif">
                                                {{ $booking->status }}
                                            </span>
                                            <svg class="w-3 h-3 text-gray-600 transition-transform duration-200" 
                                                :class="showMenu ? 'rotate-180' : ''"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                            </svg>
                                        </button>

                                        {{-- Dropdown Tabel --}}
                                        <div x-show="showMenu" 
                                            @click.away="showMenu = false"
                                            x-transition:enter="transition ease-out duration-100"
                                            x-transition:enter-start="opacity-0 scale-95 translate-y-2"
                                            x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                                            class="absolute right-0 bottom-full mb-2 w-40 origin-bottom-right bg-[#1a1a1a] border border-white/10 rounded-2xl shadow-2xl z-[90] p-1.5">
                                            
                                            <form action="{{ route('booking.status.admin', $booking->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                @foreach(['pending', 'confirmed', 'completed', 'cancelled'] as $status)
                                                    <button type="submit" name="status" value="{{ $status }}"
                                                        class="w-full text-left px-4 py-2.5 rounded-xl text-[10px] font-bold uppercase tracking-widest transition-all
                                                        {{ $booking->status === $status ? 'bg-[#d4af37] text-[#121212]' : 'text-gray-400 hover:bg-white/5 hover:text-white' }}">
                                                        {{ $status }}
                                                    </button>
                                                @endforeach
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- MODAL DETAIL --}}
        <div x-show="openDetail" 
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-[100] flex items-center justify-center p-4 bg-black/95 backdrop-blur-xl"
            style="display: none;"
            @keydown.escape.window="openDetail = false">
            
            <div class="bg-[#121212] border border-white/10 w-full max-w-2xl rounded-[40px] shadow-2xl transform transition-all relative overflow-visible" 
                x-show="openDetail"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-95 translate-y-8"
                x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                @click.away="openDetail = false">
                
                <div class="p-10">
                    <div class="flex justify-between items-center mb-10">
                        <div>
                            <div class="flex items-center gap-3 mb-1">
                                <span class="h-[1px] w-6 bg-[#d4af37]"></span>
                                <span class="text-[10px] font-black text-[#d4af37] tracking-[0.4em] uppercase">Executive Management</span>
                            </div>
                            <h2 class="text-3xl font-black text-white uppercase tracking-tighter">Booking Control</h2>
                        </div>
                        <button @click="openDetail = false" class="group p-3 bg-white/5 rounded-2xl text-gray-500 hover:text-white hover:bg-red-500/20 transition-all">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                        </button>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                        <div class="space-y-6">
                            <div class="p-6 bg-white/[0.03] rounded-[32px] border border-white/5">
                                <div class="flex items-center gap-5">
                                    <div class="h-16 w-16 bg-gradient-to-br from-[#d4af37] to-[#8a6d05] rounded-2xl flex items-center justify-center text-[#121212] font-black text-2xl shadow-lg shadow-[#d4af37]/20" 
                                        x-text="activeBooking.name ? activeBooking.name.substring(0,2).toUpperCase() : ''"></div>
                                    <div>
                                        <p class="text-[10px] font-bold text-gray-500 uppercase tracking-widest">Client Identity</p>
                                        <p class="text-white font-bold text-xl tracking-tight" x-text="activeBooking.name"></p>
                                        <p class="text-xs text-gray-400 italic" x-text="activeBooking.email"></p>
                                    </div>
                                </div>
                            </div>

                            <div class="p-5 bg-white/[0.03] rounded-2xl border border-white/5">
                                <p class="text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-1">Service Treatment</p>
                                <p class="text-lg font-bold text-white uppercase tracking-tight" x-text="activeBooking.service"></p>
                                <p class="text-sm font-black text-[#d4af37] mt-1" x-text="activeBooking.price"></p>
                            </div>
                        </div>

                        <div class="p-8 bg-white/[0.02] rounded-[32px] border border-white/5 relative h-full flex flex-col justify-center">
                            <p class="text-[10px] font-black text-gray-500 uppercase tracking-[0.3em] mb-4">Current Progress</p>
                            
                            <div class="flex items-center gap-3 relative">
                                <div class="flex-1 flex items-center justify-between py-5 px-7 rounded-[24px] bg-[#d4af37] text-[#121212] border border-[#d4af37] shadow-xl shadow-[#d4af37]/10 transition-all">
                                    <span class="text-xs font-black uppercase tracking-[0.2em]" x-text="activeBooking.status"></span>
                                    <div class="h-2 w-2 rounded-full bg-[#121212] animate-pulse"></div>
                                </div>

                                <button @click="isEditing = !isEditing" 
                                    class="p-5 bg-white/5 hover:bg-white/10 border border-white/10 rounded-[24px] text-[#d4af37] transition-all duration-300">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                    </svg>
                                </button>

                                {{-- Popover Modal: Muncul di sebelah KANAN tombol (left-full) --}}
                                <div x-show="isEditing" 
                                    x-transition:enter="transition ease-out duration-200"
                                    x-transition:enter-start="opacity-0 scale-95 -translate-x-4"
                                    x-transition:enter-end="opacity-100 scale-100 translate-x-0"
                                    x-transition:leave="transition ease-in duration-150"
                                    @click.away="isEditing = false"
                                    class="absolute left-full ml-4 top-[-60%] w-56 bg-[#1a1a1a] border border-white/10 p-3 rounded-[28px] shadow-[0_30px_60px_rgba(0,0,0,0.8)] z-[110]">
                                    
                                    <div class="px-3 py-2 border-b border-white/5 mb-2">
                                        <p class="text-[9px] font-black text-gray-500 uppercase tracking-widest">Update State</p>
                                    </div>
                                    
                                    {{-- PERBAIKAN URL ACTION: Sesuai web.php --}}
                                    <form :action="'/booking/' + activeBooking.id + '/status'" method="POST" class="space-y-1.5">
                                        @csrf @method('PATCH')
                                        <template x-for="option in ['pending', 'confirmed', 'completed', 'cancelled']">
                                            <button type="submit" name="status" :value="option"
                                                class="w-full text-left px-4 py-3 rounded-xl text-[10px] font-bold uppercase tracking-widest transition-all"
                                                :class="activeBooking.status === option ? 'bg-[#d4af37] text-[#121212]' : 'text-gray-400 hover:bg-white/5 hover:text-white'"
                                                x-text="option">
                                            </button>
                                        </template>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Modal Footer --}}
                    <div class="mt-10 pt-8 border-t border-white/5 flex justify-between items-center px-4">
                        <div class="flex items-center gap-4 text-gray-500">
                            <svg class="w-5 h-5 text-[#d4af37]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2-2v12a2 2 0 002 2z"></path></svg>
                            <span class="text-xs font-bold uppercase tracking-widest" x-text="activeBooking.date"></span>
                            <span class="h-1 w-1 rounded-full bg-white/20"></span>
                            <span class="text-xs font-black text-white" x-text="activeBooking.time"></span>
                        </div>
                        <button @click="openDetail = false" class="text-[10px] font-black text-gray-600 hover:text-white uppercase tracking-[0.3em] transition-all">
                            Dismiss Console
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>