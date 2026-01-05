<x-app-layout>
    <div class="p-6 max-w-xl">
        <h1 class="text-xl font-bold mb-4">Edit Jadwal</h1>

        <form method="POST" action="{{ route('admin.schedules.update', $schedule) }}">
            @csrf
            @method('PUT')

            <select name="barber_id" class="w-full mb-3" required>
                @foreach($barbers as $barber)
                    <option value="{{ $barber->id }}"
                        @selected($schedule->barber_id == $barber->id)>
                        {{ $barber->user->name }}
                    </option>
                @endforeach
            </select>

            <input type="date" name="date"
                value="{{ $schedule->date }}"
                class="w-full mb-3" required>

            <input type="time" name="start_time"
                value="{{ $schedule->start_time }}"
                class="w-full mb-3" required>

            <input type="time" name="end_time"
                value="{{ $schedule->end_time }}"
                class="w-full mb-3" required>

            <button class="bg-blue-600 text-white px-4 py-2 rounded">
                Update
            </button>
        </form>
    </div>
</x-app-layout>
