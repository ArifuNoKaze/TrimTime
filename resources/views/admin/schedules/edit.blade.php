<x-app-layout>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;500;600;700;800&display=swap');
        .font-instrument { font-family: 'Instrument Sans', sans-serif; }
        .bg-ultra-dark { background: radial-gradient(circle at 0% 0%, #1a1a1a 0%, #0f0f0f 50%, #0a0a0a 100%); }
        
        .form-input {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.05);
            color: white;
            transition: all 0.3s ease;
        }
        .form-input:focus {
            border-color: #d4af37;
            background: rgba(255, 255, 255, 0.07);
            box-shadow: 0 0 20px rgba(212, 175, 55, 0.1);
            outline: none;
        }
    </style>

    <div class="min-h-screen bg-ultra-dark font-instrument text-[#fdfdfc] py-12">
        <div class="max-w-5xl mx-auto px-6">
            
            <div class="mb-10">
                <a href="{{ route('admin.schedules.index') }}" class="text-[#d4af37] text-xs font-bold uppercase tracking-widest flex items-center gap-2 mb-2 group w-fit">
                    <svg class="w-4 h-4 transition-transform group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Back to Schedules
                </a>
                <h1 class="text-4xl font-black text-white uppercase tracking-tighter">Edit <span class="text-white/20">Schedule</span></h1>
            </div>

            <div class="bg-white/5 backdrop-blur-xl border border-white/5 rounded-[40px] p-8 md:p-12 shadow-2xl">
                <form method="POST" action="{{ route('admin.schedules.update', $schedule) }}" class="space-y-8">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        {{-- Pilih Layanan --}}
                        <div class="lg:col-span-2">
                            <label class="block text-[10px] font-black text-gray-500 uppercase tracking-[0.2em] mb-2 ml-4">Treatment Type</label>
                            <select name="service_id" class="form-input w-full px-6 py-4 rounded-2xl text-sm outline-none appearance-none" required>
                                @foreach($services as $service)
                                    <option value="{{ $service->id }}" class="bg-[#1a1a1a]" {{ $schedule->service_id == $service->id ? 'selected' : '' }}>
                                        {{ $service->name }} (IDR {{ number_format($service->price, 0, ',', '.') }})
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Tanggal --}}
                        <div>
                            <label class="block text-[10px] font-black text-gray-500 uppercase tracking-[0.2em] mb-2 ml-4">Date</label>
                            <input type="date" name="date" value="{{ $schedule->date }}"
                                   class="form-input w-full px-6 py-4 rounded-2xl text-sm" required>
                        </div>

                        {{-- Waktu --}}
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-[10px] font-black text-gray-500 uppercase tracking-[0.2em] mb-2 ml-4">Start Time</label>
                                <input type="time" name="start_time" value="{{ \Carbon\Carbon::parse($schedule->start_time)->format('H:i') }}"
                                       class="form-input w-full px-6 py-4 rounded-2xl text-sm" required>
                            </div>
                            <div>
                                <label class="block text-[10px] font-black text-gray-500 uppercase tracking-[0.2em] mb-2 ml-4">End Time</label>
                                <input type="time" name="end_time" value="{{ \Carbon\Carbon::parse($schedule->end_time)->format('H:i') }}"
                                       class="form-input w-full px-6 py-4 rounded-2xl text-sm" required>
                            </div>
                        </div>
                    </div>

                    <div class="pt-6 border-t border-white/5 flex flex-col sm:flex-row gap-4">
                        <button type="submit" class="flex-grow bg-[#d4af37] hover:bg-white text-[#121212] py-5 rounded-2xl text-xs font-black uppercase tracking-[0.3em] transition-all shadow-lg shadow-[#d4af37]/10">
                            Update Schedule
                        </button>
                        
                        {{-- Tombol Delete Cepat --}}
                        <button type="button" onclick="confirmDelete()" class="bg-red-500/10 hover:bg-red-500 text-red-500 hover:text-white px-8 py-5 rounded-2xl text-[10px] font-black uppercase tracking-widest transition-all">
                            Delete
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Script untuk delete --}}
    <form id="delete-form" action="{{ route('admin.schedules.destroy', $schedule) }}" method="POST" class="hidden">
        @csrf
        @method('DELETE')
    </form>

    <script>
        function confirmDelete() {
            if(confirm('Are you sure you want to delete this schedule?')) {
                document.getElementById('delete-form').submit();
            }
        }
    </script>
</x-app-layout>