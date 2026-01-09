<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\BarberController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BookingStatusController;
use App\Http\Controllers\BookingHistoryController;


Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Routes 
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('services', ServiceController::class);
});


// Schedule Routes
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('schedules', ScheduleController::class);
});


// Pelanggan Routes

// Booking Routes
Route::middleware(['auth', 'role:pelanggan'])->group(function () {
    Route::get('/booking', [BookingController::class, 'index'])->name('booking.index');
    Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
});

//redirect_dashboard sesuai role nya
Route::get('/dashboard', function () {
    return match (auth()->user()->role) {
        'admin' => redirect()-> route('admin.dashboard'),
        default => redirect()-> route('pelanggan.dashboard'),
    };
})->middleware('auth')->name('dashboard');

//ADMIN
Route::middleware(['auth','role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'admin'])
            ->name('dashboard');
    });




// PELANGGAN
Route::middleware(['auth','role:pelanggan'])
    ->prefix('pelanggan')
    ->name('pelanggan.')
    ->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'pelanggan'])
            ->name('dashboard');
    });



// Booking Status

// ADMIN
Route::middleware(['auth','role:admin'])->group(function () {
    Route::patch('/booking/{booking}/status', [BookingStatusController::class, 'adminUpdate'])
        ->name('booking.status.admin');
});


// PELANGGAN
Route::middleware(['auth','role:pelanggan'])->group(function () {
    Route::patch('/booking/{booking}/cancel', [BookingStatusController::class, 'cancel'])
        ->name('booking.cancel');
});
require __DIR__.'/auth.php';



// Booking History Routes

Route::middleware(['auth','role:pelanggan'])->group(function () {
    Route::get('/booking/history', [BookingHistoryController::class, 'index'])
        ->name('booking.history');
});
