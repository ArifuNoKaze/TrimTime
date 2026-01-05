<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Barber;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class BarberController extends Controller
{
    public function index()
    {
        $barbers = Barber::with('user')->latest()->get();
        return view('admin.barbers.index', compact('barbers'));
    }

    public function create()
    {
        return view('admin.barbers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'specialization' => 'nullable|string',
            'status' => 'required|boolean',
        ]);

        // buat user barber
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'barber',
        ]);

        // buat data barber
        Barber::create([
            'user_id' => $user->id,
            'specialization' => $request->specialization,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('admin.barbers.index')
            ->with('success', 'Barber berhasil ditambahkan');
    }

    public function edit(Barber $barber)
    {
        $barber->load('user');
        return view('admin.barbers.edit', compact('barber'));
    }

    public function update(Request $request, Barber $barber)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email,' . $barber->user_id,
            'specialization' => 'nullable|string',
            'status' => 'required|boolean',
        ]);

        $barber->user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        $barber->update([
            'specialization' => $request->specialization,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('admin.barbers.index')
            ->with('success', 'Barber berhasil diperbarui');
    }

    public function destroy(Barber $barber)
    {
        $barber->user->delete(); // otomatis hapus barber juga
        return redirect()
            ->route('admin.barbers.index')
            ->with('success', 'Barber berhasil dihapus');
    }
}
