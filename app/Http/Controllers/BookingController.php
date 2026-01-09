<?php
namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Schedule;
use App\Models\Service;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        $service = Service::findOrFail($request->service_id);

        $schedules = Schedule::where('is_available', true)
            ->where('service_id', $service->id)
            ->get();

        return view('booking.index', compact('service', 'schedules'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'service_id'  => 'required|exists:services,id',
            'schedule_id' => 'required|exists:schedules,id',
        ]);

        $schedule = Schedule::where('id', $request->schedule_id)
            ->where('is_available', true)
            ->firstOrFail();

        // 1. Simpan booking
        Booking::create([
            'user_id'     => auth()->id(),
            'service_id'  => $request->service_id,
            'schedule_id' => $schedule->id,
            'status'      => 'pending', // pastikan ada status default
        ]);

        // 2. Kunci jadwal
        $schedule->update(['is_available' => false]);


        // 4. Redirect
        return redirect()
            ->route('pelanggan.dashboard') 
            ->with('success', 'Booking berhasil!');
    }
}
