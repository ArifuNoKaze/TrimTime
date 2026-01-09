<x-app-layout>
    <div class="min-h-screen bg-[#121212] py-12">
        <div class="max-w-5xl mx-auto px-4">

            {{-- HEADER --}}
            <h2 class="text-3xl font-bold text-white mb-8">
                Konfirmasi Booking
            </h2>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                {{-- DETAIL LAYANAN --}}
                <div class="lg:col-span-1 bg-[#1a1a1a] border border-neutral-800 rounded-2xl p-6">
                    <h3 class="text-xl font-bold text-yellow-500 mb-2">
                        {{ $service->name }}
                    </h3>

                    <p class="text-neutral-400 text-sm mb-4">
                        {{ $service->description ?? 'Layanan potong rambut premium dengan barber profesional.' }}
                    </p>

                    <div class="space-y-2 text-sm">
                        <div class="flex justify-between">
                            <span class="text-neutral-400">Harga</span>
                            <span class="text-white font-semibold">
                                Rp {{ number_format($service->price, 0, ',', '.') }}
                            </span>
                        </div>

                        <div class="flex justify-between">
                            <span class="text-neutral-400">Durasi</span>
                            <span class="text-white font-semibold">
                                {{ $service->duration ?? 30 }} Menit
                            </span>
                        </div>
                    </div>
                </div>

{{-- PILIH JADWAL --}}
<div class="lg:col-span-2 bg-[#1a1a1a] border border-neutral-800 rounded-2xl p-6">
    <h3 class="text-xl font-bold text-white mb-4">
        Pilih Jadwal Tersedia
    </h3>
    @if (session('success'))
    <div class="mb-6 rounded-xl border border-green-700 bg-green-900/30 p-4">
        <div class="flex items-center gap-3">
            <div class="flex h-8 w-8 items-center justify-center rounded-full bg-green-600 text-black font-bold">
                ✓
            </div>
            <p class="text-green-300 font-semibold">
                {{ session('success') }}
            </p>
        </div>
    </div>
    @endif


    @if($schedules->isEmpty())
        <div class="p-6 bg-neutral-900 border border-neutral-700 rounded-xl text-center">
            <p class="text-neutral-300 font-semibold mb-2">
                Jadwal Belum Tersedia
            </p>
            <p class="text-neutral-500 text-sm">
                Silakan tunggu hingga admin menambahkan jadwal barber.
            </p>
        </div>
    @else
        <form method="POST" action="{{ route('booking.store') }}">
            @csrf
            <input type="hidden" name="service_id" value="{{ $service->id }}">

            <div class="space-y-3 max-h-[300px] overflow-y-auto pr-2">
                @foreach($schedules as $schedule)
                    <label class="flex items-center justify-between p-4 border border-neutral-700 rounded-lg cursor-pointer hover:border-yellow-600 transition">
                        <div class="flex items-center gap-3">
                            <input
                                type="radio"
                                name="schedule_id"
                                value="{{ $schedule->id }}"
                                required
                            >
                            <div>
                                <p class="text-white font-medium">
                                    {{ \Carbon\Carbon::parse($schedule->date)->format('d M Y') }}
                                </p>
                                <p class="text-neutral-400 text-sm">
                                    {{ $schedule->start_time }} - {{ $schedule->end_time }}
                                </p>
                            </div>
                        </div>
                        <span class="text-green-500 text-sm font-semibold">
                            Tersedia
                        </span>
                    </label>
                @endforeach
            </div>

            <button
                type="submit"
                class="mt-6 w-full py-3 bg-yellow-600 text-black font-bold rounded-lg hover:bg-yellow-500 transition">
                Konfirmasi Booking
            </button>
        </form>
    @endif
</div>


            </div>
        </div>
    </div>
</x-app-layout>
