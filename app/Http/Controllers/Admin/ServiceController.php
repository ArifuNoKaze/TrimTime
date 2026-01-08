<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::latest()->get();
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        // 1. Simpan hasil validasi ke dalam variabel
        $validatedData = $request->validate([
            'name' => 'required|string|max:100',
            'duration' => 'required|integer|min:1',
            'price' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // 2. Proses upload gambar jika ada
        if ($request->hasFile('image')) {
            // Simpan file ke storage/app/public/services
            $imagePath = $request->file('image')->store('services', 'public');
            
            // TIMPA nilai 'image' di array $validatedData dengan path yang baru
            $validatedData['image'] = $imagePath;
        }

        // 3. Gunakan $validatedData, JANGAN gunakan $request->all()
        Service::create($validatedData);

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Service berhasil ditambahkan');
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'duration' => 'required|integer|min:1',
            'price' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $service->update($request->all());

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Service berhasil diperbarui');
    }

    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Service berhasil dihapus');
    }

    public function show(Service $service)
    {
        return view('admin.services.show', compact('service'));
    }
}

