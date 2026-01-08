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
        .btn-gold {
            background: #d4af37;
            color: #121212;
            transition: all 0.3s ease;
        }
        .btn-gold:hover { background: #fdfdfc; transform: translateY(-2px); }
    </style>

    <div class="min-h-screen bg-ultra-dark font-instrument text-[#fdfdfc] py-12">
        {{-- Mengubah max-w-2xl menjadi max-w-7xl agar bisa penuh mengikuti lebar dashboard --}}
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="mb-10">
                <a href="{{ route('admin.services.index') }}" class="text-[#d4af37] text-xs font-bold uppercase tracking-widest flex items-center gap-2 mb-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Back to Services
                </a>
                <h1 class="text-4xl md:text-5xl font-black text-white uppercase tracking-tighter">Add <span class="text-white/20">New Treatment</span></h1>
            </div>

            {{-- Container Utama dibuat lebar penuh --}}
            <div class="bg-white/5 backdrop-blur-xl border border-white/5 rounded-[40px] p-6 md:p-12 shadow-2xl">
                <form method="POST" action="{{ route('admin.services.store') }}" enctype="multipart/form-data" class="space-y-8">
                    @csrf

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        {{-- Kolom Kiri: Detail Utama --}}
                        <div class="space-y-6">
                            <div>
                                <label class="block text-[10px] font-black text-gray-500 uppercase tracking-[0.2em] mb-2 ml-4">Service Name</label>
                                <input type="text" name="name" placeholder="e.g. Classic Gent's Cut"
                                       class="form-input w-full px-6 py-4 rounded-2xl text-sm" value="{{ old('name') }}" required>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-[10px] font-black text-gray-500 uppercase tracking-[0.2em] mb-2 ml-4">Duration (Min)</label>
                                    <input type="number" name="duration" placeholder="30"
                                           class="form-input w-full px-6 py-4 rounded-2xl text-sm" value="{{ old('duration') }}" required>
                                </div>
                                <div>
                                    <label class="block text-[10px] font-black text-gray-500 uppercase tracking-[0.2em] mb-2 ml-4">Price (IDR)</label>
                                    <input type="number" name="price" placeholder="50000"
                                           class="form-input w-full px-6 py-4 rounded-2xl text-sm" value="{{ old('price') }}" required>
                                </div>
                            </div>
                            
                            <div>
                                <label class="block text-[10px] font-black text-gray-500 uppercase tracking-[0.2em] mb-2 ml-4">Service Image</label>
                                <div class="relative group">
                                    <input type="file" name="image" accept="image/*"
                                           class="form-input w-full px-6 py-4 rounded-2xl text-sm file:mr-4 file:py-1 file:px-4 file:rounded-full file:border-0 file:text-[10px] file:font-black file:uppercase file:bg-[#d4af37] file:text-[#121212]">
                                </div>
                                @error('image')
                                    <p class="text-red-500 text-[10px] font-bold mt-2 ml-4 uppercase tracking-widest">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        {{-- Kolom Kanan: Deskripsi --}}
                        <div class="flex flex-col">
                            <label class="block text-[10px] font-black text-gray-500 uppercase tracking-[0.2em] mb-2 ml-4">Description</label>
                            <textarea name="description" placeholder="Describe the luxury experience..."
                                      class="form-input w-full px-6 py-4 rounded-2xl text-sm flex-grow min-h-[200px] lg:min-h-full">{{ old('description') }}</textarea>
                        </div>
                    </div>

                    {{-- Tombol Submit di bawah penuh --}}
                    <div class="pt-4">
                        <button class="btn-gold w-full py-6 rounded-2xl text-xs font-black uppercase tracking-[0.3em] shadow-lg shadow-[#d4af37]/10">
                            Confirm & Save Service
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>