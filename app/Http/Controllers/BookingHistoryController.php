<?php

namespace App\Http\Controllers;

use App\Models\Booking;

class BookingHistoryController extends Controller
{
    public function index()
    {
        $bookings = Booking::with(['service','schedule'])
            ->where('user_id', auth()->id())
            ->orderByDesc('created_at')
            ->get();

        return view('booking.history', compact('bookings'));
    }
}


