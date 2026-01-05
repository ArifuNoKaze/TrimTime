<x-app-layout>
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-4">Barber</h1>

        <a href="{{ route('admin.barbers.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded">
            + Tambah Barber
        </a>

        @if(session('success'))
            <div class="mt-4 text-green-600">
                {{ session('success') }}
            </div>
        @endif

        <table class="w-full mt-6 border">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border p-2">Nama</th>
                    <th class="border p-2">Email</th>
                    <th class="border p-2">Spesialisasi</th>
                    <th class="border p-2">Status</th>
                    <th class="border p-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($barbers as $barber)
                <tr>
                    <td class="border p-2">{{ $barber->user->name }}</td>
                    <td class="border p-2">{{ $barber->user->email }}</td>
                    <td class="border p-2">{{ $barber->specialization }}</td>
                    <td class="border p-2">
                        {{ $barber->status ? 'Aktif' : 'Nonaktif' }}
                    </td>
                    <td class="border p-2">
                        <a href="{{ route('admin.barbers.edit', $barber) }}"
                           class="text-blue-600">Edit</a>

                        <form action="{{ route('admin.barbers.destroy', $barber) }}"
                              method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Hapus barber?')"
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
