<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Barber;
use App\Models\Schedule;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        return view('booking.index', [
            'services' => Service::all(),
            'barbers' => Barber::where('status', true)->with('user')->get(),
            'schedules' => Schedule::where('is_available', true)
                ->whereDate('date', '>=', now()->toDateString())
                ->with('barber.user')
                ->get(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'barber_id' => 'required|exists:barbers,id',
            'schedule_id' => 'required|exists:schedules,id',
        ]);

        $schedule = Schedule::where('id', $request->schedule_id)
            ->where('is_available', true)
            ->firstOrFail();

        // simpan booking
        Booking::create([
            'user_id' => auth()->id(),
            'barber_id' => $request->barber_id,
            'service_id' => $request->service_id,
            'schedule_id' => $schedule->id,
            'status' => 'confirmed',
        ]);

        // kunci jadwal
        $schedule->update([
            'is_available' => false
        ]);

        return redirect()
            ->route('booking.index')
            ->with('success', 'Booking berhasil 🎉');
    }
}
