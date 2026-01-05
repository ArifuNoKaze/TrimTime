<x-app-layout>
    <div class="p-6 max-w-xl">
        <h1 class="text-xl font-bold mb-4">Tambah Service</h1>

        <form method="POST" action="{{ route('admin.services.store') }}">
            @csrf

            <input type="text" name="name" placeholder="Nama Service"
                class="w-full mb-3" required>

            <input type="number" name="duration" placeholder="Durasi (menit)"
                class="w-full mb-3" required>

            <input type="number" name="price" placeholder="Harga"
                class="w-full mb-3" required>

            <textarea name="description" placeholder="Deskripsi"
                class="w-full mb-3"></textarea>

            <button class="bg-green-600 text-white px-4 py-2 rounded">
                Simpan
            </button>
        </form>
    </div>
</x-app-layout>
