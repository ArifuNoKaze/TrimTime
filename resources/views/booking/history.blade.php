<x-app-layout>
    <div class="min-h-screen bg-[#121212] text-[#fdfdfc] font-['Instrument_Sans'] py-12">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-end mb-8 gap-4">
                <div>
                    <h1 class="text-3xl font-bold tracking-tight text-white">
                        Riwayat <span class="text-yellow-500">Booking</span>
                    </h1>
                    <p class="mt-2 text-neutral-400 text-sm">
                        Arsip perjalanan gaya rambut Anda.
                    </p>
                </div>
                
                <a href="{{ route('dashboard') }}" class="group flex items-center text-sm text-neutral-400 hover:text-white transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 transform group-hover:-translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Kembali ke Dashboard
                </a>
            </div>

            <div class="bg-[#1a1a1a] border border-neutral-800 rounded-2xl shadow-xl overflow-hidden">
                
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-neutral-900/50 border-b border-neutral-800 text-xs uppercase tracking-widest text-neutral-500">
                                <th class="p-6 font-medium">Layanan</th>
                                <th class="p-6 font-medium">Jadwal</th>
                                <th class="p-6 font-medium text-center">Durasi</th>
                                <th class="p-6 font-medium text-center">Status</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-neutral-800 text-sm">
                            @forelse($bookings as $booking)
                            <tr class="group hover:bg-neutral-800/50 transition-colors duration-200">
                                
                                <td class="p-6">
                                    <div class="flex items-center gap-4">
                                        <div class="h-10 w-10 rounded-lg bg-neutral-800 border border-neutral-700 
                                                    flex items-center justify-center text-yellow-600 
                                                    group-hover:border-yellow-600/50 transition-colors">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M14.121 14.121L19 19m-7-7l7-7m-7 7l-2.879 2.879M12 12L9.121 9.121m0 5.758a3 3 0 10-4.243 4.243 3 3 0 004.243-4.243zm0-5.758a3 3 0 10-4.243-4.243 3 3 0 004.243 4.243z" />
                                            </svg>
                                        </div>

                                        <div class="flex flex-col">
                                            <div class="font-bold text-white text-base leading-tight">
                                                {{ $booking->service->name }}
                                            </div>

                                            @if($booking->barber)
                                            <div class="text-neutral-500 text-xs mt-1">
                                                by {{ $booking->barber->user->name ?? 'Barber' }}
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </td>

                                <td class="p-6">
                                    <div class="flex flex-col">
                                        <span class="text-white font-medium">
                                            {{ \Carbon\Carbon::parse($booking->schedule->date)->format('d M Y') }}
                                        </span>
                                        <span class="text-neutral-500 text-xs mt-1">
                                            {{ \Carbon\Carbon::parse($booking->schedule->date)->format('l') }}
                                        </span>
                                    </div>
                                </td>

                                <td class="p-6 text-center">
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-md bg-neutral-900 border border-neutral-700 text-neutral-300 font-mono text-xs">
                                        {{ \Carbon\Carbon::parse($booking->schedule->start_time)->format('H:i') }}
                                        <span class="mx-1 text-neutral-600">-</span>
                                        {{ \Carbon\Carbon::parse($booking->schedule->end_time)->format('H:i') }}
                                    </span>
                                </td>

                                <td class="p-6 text-center">
                                    @php
                                        $statusConfig = [
                                            'pending' => [
                                                'label' => 'Pending',
                                                'bg' => 'bg-yellow-500/10',
                                                'text' => 'text-yellow-400',
                                                'border' => 'border-yellow-500/30',
                                                'dot' => 'bg-yellow-400',
                                            ],
                                            'confirmed' => [
                                                'label' => 'Confirmed',
                                                'bg' => 'bg-green-500/10',
                                                'text' => 'text-green-400',
                                                'border' => 'border-green-500/30',
                                                'dot' => 'bg-green-400',
                                            ],
                                            'completed' => [
                                                'label' => 'Completed',
                                                'bg' => 'bg-blue-500/10',
                                                'text' => 'text-blue-400',
                                                'border' => 'border-blue-500/30',
                                                'dot' => 'bg-blue-400',
                                            ],
                                            'cancelled' => [
                                                'label' => 'Cancelled',
                                                'bg' => 'bg-red-500/10',
                                                'text' => 'text-red-400',
                                                'border' => 'border-red-500/30',
                                                'dot' => 'bg-red-400',
                                            ],
                                        ];

                                        $status = $statusConfig[$booking->status] ?? null;
                                    @endphp

                                    @if($status)
                                    <span
                                        class="inline-flex items-center justify-center gap-2
                                            h-7 px-3 rounded-full text-xs font-semibold uppercase tracking-wide
                                            border {{ $status['bg'] }} {{ $status['text'] }} {{ $status['border'] }}">
                                        
                                        <span class="w-2 h-2 rounded-full {{ $status['dot'] }}"></span>

                                        {{ $status['label'] }}
                                    </span>
                                    @endif

                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="p-12 text-center">
                                    <div class="flex flex-col items-center justify-center">
                                        <div class="w-16 h-16 bg-neutral-800 rounded-full flex items-center justify-center mb-4 border border-neutral-700">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-neutral-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </div>
                                        <h3 class="text-lg font-medium text-white mb-1">Belum ada riwayat</h3>
                                        <p class="text-neutral-500 text-sm mb-6">Anda belum pernah melakukan booking layanan kami.</p>
                                        
                                        <a href="{{ route('dashboard') }}" class="px-6 py-2 bg-yellow-600 hover:bg-yellow-500 text-black font-bold rounded-lg transition-colors shadow-lg shadow-yellow-600/20">
                                            Booking Sekarang
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if(method_exists($bookings, 'hasPages') && $bookings->hasPages())
                <div class="px-6 py-4 border-t border-neutral-800 bg-[#151515]">
                    {{ $bookings->links() }}
                </div>
                @endif
                
            </div>
            
            <div class="mt-8 flex justify-center opacity-30">
                <div class="h-1 w-24 bg-gradient-to-r from-transparent via-yellow-600 to-transparent rounded-full"></div>
            </div>

        </div>
    </div>
</x-app-layout>