<x-app-layout>
    <div class="p-6 max-w-xl">
        <h1 class="text-xl font-bold mb-4">Tambah Service</h1>

        <form method="POST"
              action="{{ route('admin.services.store') }}"
              enctype="multipart/form-data">
            @csrf

            <input type="text" name="name" placeholder="Nama Service"
                class="w-full mb-3 border rounded px-3 py-2"
                value="{{ old('name') }}" required>

            <input type="number" name="duration" placeholder="Durasi (menit)"
                class="w-full mb-3 border rounded px-3 py-2"
                value="{{ old('duration') }}" required>

            <input type="number" name="price" placeholder="Harga"
                class="w-full mb-3 border rounded px-3 py-2"
                value="{{ old('price') }}" required>

            <textarea name="description" placeholder="Deskripsi"
                class="w-full mb-3 border rounded px-3 py-2">{{ old('description') }}</textarea>

            {{-- Upload Gambar --}}
            <label class="block mb-1 font-semibold">Gambar Service</label>
            <input type="file" name="image"
                class="w-full mb-4"
                accept="image/*">

            {{-- Error validation --}}
            @error('image')
                <p class="text-red-500 text-sm mb-2">{{ $message }}</p>
            @enderror

            <button class="bg-green-600 text-white px-4 py-2 rounded">
                Simpan
            </button>
        </form>
    </div>
</x-app-layout>
