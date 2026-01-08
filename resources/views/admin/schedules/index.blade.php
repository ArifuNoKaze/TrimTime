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
        }

        .btn-gold {
            background: #d4af37;
            color: #121212;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .btn-gold:hover {
            background: #fdfdfc;
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(212, 175, 55, 0.2);
        }

        .status-badge {
            padding: 4px 12px;
            border-radius: 99px;
            font-size: 10px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.1em;
        }
    </style>

    <div class="min-h-screen bg-ultra-dark font-instrument text-[#fdfdfc] py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            {{-- Header Section --}}
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-12 gap-6">
                <div>
                    <a href="{{ route('admin.dashboard') }}" class="text-[#d4af37] text-xs font-bold uppercase tracking-widest flex items-center gap-2 mb-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                        Back to Dashboard
                    </a>
                    <h1 class="text-4xl md:text-5xl font-extrabold tracking-tighter text-white uppercase">
                        Jadwal <span class="text-white/20">Barber</span>
                    </h1>
                </div>

                <a href="{{ route('admin.schedules.create') }}" 
                   class="btn-gold px-8 py-4 rounded-2xl text-xs font-black uppercase tracking-[0.2em] flex items-center gap-3">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Tambah Jadwal
                </a>
            </div>

            @if(session('success'))
                <div class="mb-8 p-4 bg-green-500/10 border border-green-500/20 rounded-2xl flex items-center gap-3">
                    <div class="h-2 w-2 rounded-full bg-green-500 animate-pulse"></div>
                    <p class="text-green-500 text-xs font-bold uppercase tracking-widest">{{ session('success') }}</p>
                </div>
            @endif

            {{-- Table Container --}}
            <div class="bento-card rounded-[32px] overflow-hidden shadow-2xl">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-white/[0.02] text-[10px] font-black uppercase tracking-[0.2em] text-gray-500">
                                <th class="px-8 py-6 border-b border-white/5">Tanggal</th>
                                <th class="px-8 py-6 border-b border-white/5">Slot Waktu</th>
                                <th class="px-8 py-6 border-b border-white/5 text-center">Availability</th>
                                <th class="px-8 py-6 border-b border-white/5 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/5">
                            @forelse($schedules as $schedule)
                            <tr class="hover:bg-white/[0.02] transition-colors group">
                                <td class="px-8 py-6">
                                    <div class="flex items-center gap-4">
                                        <div class="h-10 w-10 rounded-xl bg-white/5 flex flex-col items-center justify-center border border-white/10 group-hover:border-[#d4af37]/40 transition-colors">
                                            <span class="text-[10px] font-bold text-[#d4af37] leading-none uppercase">{{ \Carbon\Carbon::parse($schedule->date)->format('M') }}</span>
                                            <span class="text-sm font-black text-white leading-none mt-1">{{ \Carbon\Carbon::parse($schedule->date)->format('d') }}</span>
                                        </div>
                                        <div>
                                            <p class="text-sm font-bold text-white uppercase tracking-tight">
                                                {{ \Carbon\Carbon::parse($schedule->date)->format('l') }}
                                            </p>
                                            <p class="text-[10px] text-gray-500 font-medium">
                                                {{ \Carbon\Carbon::parse($schedule->date)->format('Y') }}
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-8 py-6">
                                    <div class="inline-flex items-center gap-3 bg-white/5 px-4 py-2 rounded-xl border border-white/5">
                                        <svg class="w-3 h-3 text-[#d4af37]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span class="text-xs font-black text-white tracking-widest">
                                            {{ \Carbon\Carbon::parse($schedule->start_time)->format('H:i') }} — {{ \Carbon\Carbon::parse($schedule->end_time)->format('H:i') }}
                                        </span>
                                    </div>
                                </td>
                                <td class="px-8 py-6 text-center">
                                    @if($schedule->is_available)
                                        <span class="status-badge bg-green-500/10 text-green-500 border border-green-500/20">Tersedia</span>
                                    @else
                                        <span class="status-badge bg-red-500/10 text-red-500 border border-red-500/20">Booked</span>
                                    @endif
                                </td>
                                <td class="px-8 py-6 text-right">
                                    <div class="flex justify-end gap-2">
                                        <a href="{{ route('admin.schedules.edit', $schedule) }}" 
                                           class="p-2.5 bg-white/5 rounded-xl text-gray-500 hover:text-[#d4af37] hover:bg-[#d4af37]/10 transition-all border border-white/5">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                            </svg>
                                        </a>

                                        <form action="{{ route('admin.schedules.destroy', $schedule) }}" method="POST" class="inline">
                                            @csrf @method('DELETE')
                                            <button onclick="return confirm('Hapus jadwal ini?')" 
                                                    class="p-2.5 bg-white/5 rounded-xl text-gray-500 hover:text-red-500 hover:bg-red-500/10 transition-all border border-white/5">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="px-8 py-20 text-center">
                                    <div class="flex flex-col items-center">
                                        <div class="h-16 w-16 bg-white/5 rounded-3xl flex items-center justify-center text-gray-700 mb-4 border border-white/5">
                                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                        </div>
                                        <p class="text-xs font-black uppercase tracking-[0.3em] text-gray-600">No schedules assigned yet.</p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Footer Stat --}}
            <div class="mt-8 flex items-center justify-between px-4 text-[10px] font-bold text-gray-600 uppercase tracking-widest">
                <p>Showing {{ count($schedules) }} Available Slots</p>
                <p>Door Square Executive System</p>
            </div>
        </div>
    </div>
</x-app-layout>