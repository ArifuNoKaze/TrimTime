<x-app-layout>
    <div class="p-6 max-w-xl">
        <h1 class="text-xl font-bold mb-4">Tambah Barber</h1>

        <form method="POST" action="{{ route('admin.barbers.store') }}">
            @csrf

            <input type="text" name="name" placeholder="Nama Barber"
                class="w-full mb-3" required>

            <input type="email" name="email" placeholder="Email"
                class="w-full mb-3" required>

            <input type="password" name="password" placeholder="Password"
                class="w-full mb-3" required>

            <input type="text" name="specialization" placeholder="Spesialisasi"
                class="w-full mb-3">

            <select name="status" class="w-full mb-3">
                <option value="1">Aktif</option>
                <option value="0">Nonaktif</option>
            </select>

            <button class="bg-green-600 text-white px-4 py-2 rounded">
                Simpan
            </button>
        </form>
    </div>
</x-app-layout>
