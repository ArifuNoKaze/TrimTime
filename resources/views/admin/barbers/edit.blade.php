<x-app-layout>
    <div class="p-6 max-w-xl">
        <h1 class="text-xl font-bold mb-4">Edit Barber</h1>

        <form method="POST" action="{{ route('admin.barbers.update', $barber) }}">
            @csrf
            @method('PUT')

            <input type="text" name="name"
                value="{{ $barber->user->name }}"
                class="w-full mb-3" required>

            <input type="email" name="email"
                value="{{ $barber->user->email }}"
                class="w-full mb-3" required>

            <input type="text" name="specialization"
                value="{{ $barber->specialization }}"
                class="w-full mb-3">

            <select name="status" class="w-full mb-3">
                <option value="1" @selected($barber->status)>Aktif</option>
                <option value="0" @selected(!$barber->status)>Nonaktif</option>
            </select>

            <button class="bg-blue-600 text-white px-4 py-2 rounded">
                Update
            </button>
        </form>
    </div>
</x-app-layout>
