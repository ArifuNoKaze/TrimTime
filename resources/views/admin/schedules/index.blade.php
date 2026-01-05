<x-app-layout>
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-4">Jadwal Barber</h1>

        <a href="{{ route('admin.schedules.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded">
            + Tambah Jadwal
        </a>

        @if(session('success'))
            <div class="mt-4 text-green-600">
                {{ session('success') }}
            </div>
        @endif

        <table class="w-full mt-6 border">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border p-2">Barber</th>
                    <th class="border p-2">Tanggal</th>
                    <th class="border p-2">Jam</th>
                    <th class="border p-2">Status</th>
                    <th class="border p-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($schedules as $schedule)
                <tr>
                    <td class="border p-2">
                        {{ $schedule->barber->user->name }}
                    </td>
                    <td class="border p-2">
                        {{ $schedule->date }}
                    </td>
                    <td class="border p-2">
                        {{ $schedule->start_time }} - {{ $schedule->end_time }}
                    </td>
                    <td class="border p-2">
                        {{ $schedule->is_available ? 'Tersedia' : 'Booked' }}
                    </td>
                    <td class="border p-2">
                        <a href="{{ route('admin.schedules.edit', $schedule) }}"
                           class="text-blue-600">Edit</a>

                        <form action="{{ route('admin.schedules.destroy', $schedule) }}"
                              method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Hapus jadwal?')"
                                    class="text-red-600 ml-2">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
