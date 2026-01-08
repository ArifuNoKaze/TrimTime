<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::orderBy('date')
            ->orderBy('start_time')
            ->get();

        return view('admin.schedules.index', compact('schedules'));
    }

    public function create()
    {
        $services = \App\Models\Service::all(); // Ambil semua layanan
        return view('admin.schedules.create', compact('services'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
        ]);

        // Cegah jadwal bentrok (GLOBAL)
        $exists = Schedule::where('date', $request->date)
            ->where(function ($q) use ($request) {
                $q->whereBetween('start_time', [$request->start_time, $request->end_time])
                  ->orWhereBetween('end_time', [$request->start_time, $request->end_time])
                  ->orWhere(function ($q2) use ($request) {
                      $q2->where('start_time', '<=', $request->start_time)
                         ->where('end_time', '>=', $request->end_time);
                  });
            })
            ->exists();

        if ($exists) {
            return back()->withErrors([
                'start_time' => 'Jadwal bentrok dengan jadwal lain'
            ])->withInput();
        }

        Schedule::create([
            'service_id' => $request->service_id,
            'date' => $request->date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'is_available' => true,
        ]);

        return redirect()
            ->route('admin.schedules.index')
            ->with('success', 'Jadwal berhasil ditambahkan');
    }

    public function edit(Schedule $schedule)
    {
        $services = \App\Models\Service::all(); // Tambahkan ini
        return view('admin.schedules.edit', compact('schedule', 'services'));
    }

    public function update(Request $request, Schedule $schedule)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
        ]);

        $schedule->update([
            'service_id' => $request->service_id,
            'date' => $request->date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
        ]);

        return redirect()
            ->route('admin.schedules.index')
            ->with('success', 'Jadwal berhasil diperbarui');
    }

    public function destroy(Schedule $schedule)
    {
        $schedule->delete();

        return redirect()
            ->route('admin.schedules.index')
            ->with('success', 'Jadwal berhasil dihapus');
    }
}
