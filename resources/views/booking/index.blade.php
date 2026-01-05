<x-app-layout>
    <div class="p-6 max-w-xl">
        <h1 class="text-2xl font-bold mb-4">Booking TrimTime</h1>

        @if(session('success'))
            <div class="text-green-600 mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('booking.store') }}">
            @csrf

            <select name="service_id" class="w-full mb-3" required>
                <option value="">Pilih Service</option>
                @foreach($services as $service)
                    <option value="{{ $service->id }}">
                        {{ $service->name }} - Rp {{ number_format($service->price) }}
                    </option>
                @endforeach
            </select>

            <select name="barber_id" class="w-full mb-3" required>
                <option value="">Pilih Barber</option>
                @foreach($barbers as $barber)
                    <option value="{{ $barber->id }}">
                        {{ $barber->user->name }}
                    </option>
                @endforeach
            </select>

            <select name="schedule_id" class="w-full mb-3" required>
                <option value="">Pilih Jadwal</option>
                @foreach($schedules as $schedule)
                    <option value="{{ $schedule->id }}">
                        {{ $schedule->barber->user->name }} |
                        {{ $schedule->date }} |
                        {{ $schedule->start_time }} - {{ $schedule->end_time }}
                    </option>
                @endforeach
            </select>

            <button class="bg-green-600 text-white px-4 py-2 rounded">
                Booking Sekarang
            </button>
        </form>
    </div>
</x-app-layout>
