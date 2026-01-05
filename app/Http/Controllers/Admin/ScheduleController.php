<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use App\Models\Barber;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::with('barber.user')
            ->orderBy('date')
            ->orderBy('start_time')
            ->get();

        return view('admin.schedules.index', compact('schedules'));
    }

    public function create()
    {
        $barbers = Barber::where('status', true)->with('user')->get();
        return view('admin.schedules.create', compact('barbers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'barber_id' => 'required|exists:barbers,id',
            'date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
        ]);

        // Cegah jadwal bentrok
        $exists = Schedule::where('barber_id', $request->barber_id)
            ->where('date', $request->date)
            ->where(function ($q) use ($request) {
                $q->whereBetween('start_time', [$request->start_time, $request->end_time])
                  ->orWhereBetween('end_time', [$request->start_time, $request->end_time]);
            })
            ->exists();

        if ($exists) {
            return back()->withErrors([
                'start_time' => 'Jadwal bentrok dengan jadwal lain'
            ])->withInput();
        }

        Schedule::create([
            'barber_id' => $request->barber_id,
            'date' => $request->date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
        ]);

        return redirect()
            ->route('admin.schedules.index')
            ->with('success', 'Jadwal berhasil ditambahkan');
    }

    public function edit(Schedule $schedule)
    {
        $barbers = Barber::where('status', true)->with('user')->get();
        return view('admin.schedules.edit', compact('schedule', 'barbers'));
    }

    public function update(Request $request, Schedule $schedule)
    {
        $request->validate([
            'barber_id' => 'required|exists:barbers,id',
            'date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
        ]);

        $schedule->update($request->all());

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
