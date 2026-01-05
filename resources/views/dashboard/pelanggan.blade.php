<x-app-layout>
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-4">Riwayat Booking Saya</h1>

        <table class="w-full border">
            <tr>
                <th>Barber</th>
                <th>Service</th>
                <th>Jadwal</th>
                <th>Status</th>
            </tr>

            @foreach($bookings as $booking)
            <tr>
                <td>{{ $booking->barber->user->name }}</td>
                <td>{{ $booking->service->name }}</td>
                <td>
                    {{ $booking->schedule->date }}
                    {{ $booking->schedule->start_time }}
                </td>
                <td>
                    <span class="capitalize">{{ $booking->status }}</span>

                @if(in_array($booking->status, ['pending','confirmed']))
                    @if($booking->canBeCancelled())
                        <form method="POST"
                            action="{{ route('booking.cancel', $booking) }}">
                            @csrf
                            @method('PATCH')

                            <button class="text-red-600">
                                Batalkan
                            </button>
                        </form>
                    @else
                        <span class="text-gray-400 text-sm">
                            Tidak bisa dibatalkan (H-1)
                        </span>
                    @endif
                @endif
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</x-app-layout>
