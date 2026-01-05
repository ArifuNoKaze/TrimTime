<x-app-layout>
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-4">Service</h1>

        <a href="{{ route('admin.services.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded">
            + Tambah Service
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
                    <th class="border p-2">Durasi (menit)</th>
                    <th class="border p-2">Harga</th>
                    <th class="border p-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($services as $service)
                <tr>
                    <td class="border p-2">{{ $service->name }}</td>
                    <td class="border p-2">{{ $service->duration }}</td>
                    <td class="border p-2">Rp {{ number_format($service->price) }}</td>
                    <td class="border p-2">
                        <a href="{{ route('admin.services.edit', $service) }}"
                           class="text-blue-600">Edit</a>

                        <form action="{{ route('admin.services.destroy', $service) }}"
                              method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Hapus service?')"
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
