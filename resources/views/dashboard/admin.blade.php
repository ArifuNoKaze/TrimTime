<x-app-layout>
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-6">Admin Dashboard</h1>

        <div class="grid grid-cols-4 gap-4 mb-6">
            <div>Total User: {{ $totalUsers }}</div>
            <div>Total Service: {{ $totalServices }}</div>
            <div>Total Booking: {{ $totalBookings }}</div>
        </div>

        <h2 class="text-xl font-semibold mb-2">Booking Terbaru</h2>

        <table class="w-full border">
            <tr>
                <th>User</th>
                <th>Barber</th>
                <th>Service</th>
                <th>Status</th>
            </tr>

            @foreach($latestBookings as $booking)
            <tr>
                <td>{{ $booking->user->name }}</td>
                <td>{{ $booking->barber->user->name }}</td>
                <td>{{ $booking->service->name }}</td>
                <td>
                    <form method="POST"
                          action="{{ route('booking.status.admin', $booking) }}">
                        @csrf
                        @method('PATCH')

                        <select name="status"
                                onchange="this.form.submit()"
                                class="border rounded px-2 py-1">
                            @foreach(['pending','confirmed','completed','cancelled'] as $status)
                                <option value="{{ $status }}"
                                    @selected($booking->status === $status)>
                                    {{ ucfirst($status) }}
                                </option>
                            @endforeach
                        </select>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</x-app-layout>
