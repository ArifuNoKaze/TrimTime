<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\User;
use App\Models\Service;

class DashboardController extends Controller
{
    // ADMIN DASHBOARD
    public function admin()
    {
        return view('dashboard.admin', [
            'totalUsers' => User::count(),
            'totalServices' => Service::count(),
            'totalBookings' => Booking::count(),
            'latestBookings' => Booking::with('user','barber.user','service')
                ->latest()
                ->take(5)
                ->get(),
        ]);
    }

    // BARBER DASHBOARD
    public function barber()
    {
        $barber = auth()->user()->barber;

        return view('dashboard.barber', [
            'todayBookings' => Booking::where('barber_id', $barber->id)
                ->whereDate('created_at', today())
                ->with('user','service','schedule')
                ->get(),
        ]);
    }

    // PELANGGAN DASHBOARD
    public function pelanggan()
    {
        return view('dashboard.pelanggan', [
            'bookings' => Booking::where('user_id', auth()->id())
                ->with('service','schedule')
                ->latest()
                ->get(),
        ]);
    }
}

