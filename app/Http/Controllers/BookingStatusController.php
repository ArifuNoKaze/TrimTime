<?php
namespace App\Http\Controllers;

use App\Models\Booking;
use Carbon\Carbon;

class BookingStatusController extends Controller
{
    // ADMIN bebas ubah status
    public function adminUpdate(Booking $booking)
    {
        request()->validate([
            'status' => 'required|in:pending,confirmed,completed,cancelled',
        ]);

        $booking->update([
            'status' => request('status'),
        ]);

        // jika cancel → buka jadwal lagi
        if (request('status') === 'cancelled') {
            $booking->schedule->update(['is_available' => true]);
        }

        return back()->with('success', 'Status booking diperbarui');
    }

    // BARBER menyelesaikan layanan
    public function complete(Booking $booking)
    {
        // pastikan barber pemilik booking
        if ($booking->barber->user_id !== auth()->id()) {
            abort(403);
        }

        $booking->update(['status' => 'completed']);

        return back()->with('success', 'Booking diselesaikan');
    }

    // PELANGGAN membatalkan

    public function cancel(Booking $booking)
    {
        // pastikan milik user
        if ($booking->user_id !== auth()->id()) {
            abort(403);
        }

        if ($booking->status === 'completed') {
            return back()->withErrors('Booking sudah selesai');
        }

        // waktu jadwal
        $scheduleTime = Carbon::parse(
            $booking->schedule->date . ' ' . $booking->schedule->start_time
        );

        // batas cancel (H-1)
        if (now()->diffInHours($scheduleTime, false) < 24) {
            return back()->withErrors(
                'Booking hanya bisa dibatalkan maksimal H-1 sebelum jadwal'
            );
        }

        $booking->update([
            'status' => 'cancelled',
        ]);

        // buka jadwal lagi
        $booking->schedule->update([
            'is_available' => true,
        ]);

        return back()->with('success', 'Booking berhasil dibatalkan');
    }

}
