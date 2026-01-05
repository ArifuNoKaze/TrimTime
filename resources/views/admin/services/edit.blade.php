<x-app-layout>
    <div class="p-6 max-w-xl">
        <h1 class="text-xl font-bold mb-4">Edit Service</h1>

        <form method="POST" action="{{ route('admin.services.update', $service) }}">
            @csrf
            @method('PUT')

            <input type="text" name="name" value="{{ $service->name }}"
                class="w-full mb-3" required>

            <input type="number" name="duration" value="{{ $service->duration }}"
                class="w-full mb-3" required>

            <input type="number" name="price" value="{{ $service->price }}"
                class="w-full mb-3" required>

            <textarea name="description"
                class="w-full mb-3">{{ $service->description }}</textarea>

            <button class="bg-blue-600 text-white px-4 py-2 rounded">
                Update
            </button>
        </form>
    </div>
</x-app-layout>
