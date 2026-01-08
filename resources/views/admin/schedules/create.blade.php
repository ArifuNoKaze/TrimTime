<x-app-layout>
    <div class="min-h-screen bg-ultra-dark font-instrument text-[#fdfdfc] py-12">
        <div class="max-w-7xl mx-auto px-6">
            <div class="mb-10">
                <a href="{{ route('admin.schedules.index') }}" class="text-[#d4af37] text-xs font-bold uppercase tracking-widest flex items-center gap-2 mb-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Back to Schedules
                </a>
                <h1 class="text-4xl font-black text-white uppercase tracking-tighter">Add <span class="text-white/20">New Schedule</span></h1>
            </div>

            <div class="bg-white/5 backdrop-blur-xl border border-white/5 rounded-[40px] p-10 shadow-2xl">
                <form method="POST" action="{{ route('admin.schedules.store') }}" class="space-y-6">
                    @csrf

                    {{-- Dropdown Pilih Service --}}
                    <div>
                        <label class="block text-[10px] font-black text-gray-500 uppercase tracking-[0.2em] mb-2 ml-4">Select Service</label>
                        <select name="service_id" class="w-full bg-white/5 border border-white/5 rounded-2xl px-6 py-4 text-sm focus:border-[#d4af37] outline-none transition-all" required>
                            <option value="" class="bg-black">Choose a treatment...</option>
                            @foreach($services as $service)
                                <option value="{{ $service->id }}" class="bg-black">{{ $service->name }}</option>
                            @endforeach
                        </select>
                        @error('service_id') <p class="text-red-500 text-xs mt-1 ml-4">{{ $message }}</p> @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div>
                            <label class="block text-[10px] font-black text-gray-500 uppercase tracking-[0.2em] mb-2 ml-4">Date</label>
                            <input type="date" name="date" class="w-full bg-white/5 border border-white/5 rounded-2xl px-6 py-4 text-sm focus:border-[#d4af37] outline-none" required>
                        </div>
                        <div>
                            <label class="block text-[10px] font-black text-gray-500 uppercase tracking-[0.2em] mb-2 ml-4">Start Time</label>
                            <input type="time" name="start_time" class="w-full bg-white/5 border border-white/5 rounded-2xl px-6 py-4 text-sm focus:border-[#d4af37] outline-none" required>
                        </div>
                        <div>
                            <label class="block text-[10px] font-black text-gray-500 uppercase tracking-[0.2em] mb-2 ml-4">End Time</label>
                            <input type="time" name="end_time" class="w-full bg-white/5 border border-white/5 rounded-2xl px-6 py-4 text-sm focus:border-[#d4af37] outline-none" required>
                        </div>
                    </div>

                    <div class="pt-6">
                        <button class="w-full bg-[#d4af37] text-[#121212] py-5 rounded-2xl text-xs font-black uppercase tracking-[0.3em] hover:bg-white transition-all shadow-lg shadow-[#d4af37]/10">
                            Save Schedule
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>