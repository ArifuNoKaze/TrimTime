<x-app-layout>
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-4">Dashboard Barber</h1>

        <h2 class="text-lg mb-2">Booking Hari Ini</h2>

        <ul>
            @forelse($todayBookings as $booking)
                <li class="mb-2">
                    {{ $booking->schedule->start_time }} -
                    {{ $booking->user->name }} |
                    {{ $booking->service->name }}

                    @if($booking->status === 'confirmed')
                        <form method="POST"
                              action="{{ route('booking.complete', $booking) }}"
                              class="inline">
                            @csrf
                            @method('PATCH')

                            <button class="text-green-600 ml-2">
                                Tandai Selesai
                            </button>
                        </form>
                    @endif
                </li>
            @empty
                <li>Tidak ada booking hari ini</li>
            @endforelse
        </ul>
    </div>
</x-app-layout>
