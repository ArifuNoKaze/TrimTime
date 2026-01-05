<x-app-layout>
    <div class="p-6 max-w-xl">
        <h1 class="text-xl font-bold mb-4">Tambah Jadwal</h1>

        <form method="POST" action="{{ route('admin.schedules.store') }}">
            @csrf

            <select name="barber_id" class="w-full mb-3" required>
                <option value="">Pilih Barber</option>
                @foreach($barbers as $barber)
                    <option value="{{ $barber->id }}">
                        {{ $barber->user->name }}
                    </option>
                @endforeach
            </select>

            <input type="date" name="date" class="w-full mb-3" required>

            <input type="time" name="start_time" class="w-full mb-3" required>

            <input type="time" name="end_time" class="w-full mb-3" required>

            <button class="bg-green-600 text-white px-4 py-2 rounded">
                Simpan
            </button>
        </form>
    </div>
</x-app-layout>
