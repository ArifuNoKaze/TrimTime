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
        <div class="max-w-5xl mx-auto px-6">
            
            <div class="mb-10">
                <a href="{{ route('admin.services.index') }}" class="text-[#d4af37] text-xs font-bold uppercase tracking-widest flex items-center gap-2 mb-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Back to Services
                </a>
                <h1 class="text-4xl font-black text-white uppercase tracking-tighter">Edit <span class="text-white/20">Treatment</span></h1>
            </div>

            <div class="bg-white/5 backdrop-blur-xl border border-white/5 rounded-[40px] p-8 md:p-12 shadow-2xl">
                <form method="POST" action="{{ route('admin.services.update', $service) }}" enctype="multipart/form-data" class="space-y-8">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                        
                        {{-- Kolom Kiri: Form Fields --}}
                        <div class="space-y-6">
                            <div>
                                <label class="block text-[10px] font-black text-gray-500 uppercase tracking-[0.2em] mb-2 ml-4">Service Name</label>
                                <input type="text" name="name" value="{{ old('name', $service->name) }}"
                                       class="form-input w-full px-6 py-4 rounded-2xl text-sm" required>
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-[10px] font-black text-gray-500 uppercase tracking-[0.2em] mb-2 ml-4">Duration (Min)</label>
                                    <input type="number" name="duration" value="{{ old('duration', $service->duration) }}"
                                           class="form-input w-full px-6 py-4 rounded-2xl text-sm" required>
                                </div>
                                <div>
                                    <label class="block text-[10px] font-black text-gray-500 uppercase tracking-[0.2em] mb-2 ml-4">Price (IDR)</label>
                                    <input type="number" name="price" value="{{ old('price', $service->price) }}"
                                           class="form-input w-full px-6 py-4 rounded-2xl text-sm" required>
                                </div>
                            </div>

                            <div>
                                <label class="block text-[10px] font-black text-gray-500 uppercase tracking-[0.2em] mb-2 ml-4">Description</label>
                                <textarea name="description" rows="5"
                                          class="form-input w-full px-6 py-4 rounded-2xl text-sm">{{ old('description', $service->description) }}</textarea>
                            </div>
                        </div>

                        {{-- Kolom Kanan: Gambar --}}
                        <div class="space-y-6">
                            <label class="block text-[10px] font-black text-gray-500 uppercase tracking-[0.2em] mb-2 ml-4">Service Image</label>
                            
                            {{-- Preview Area --}}
                            <div class="relative group rounded-[30px] overflow-hidden border border-white/10 bg-white/5 h-64 flex items-center justify-center">
                                @if($service->image)
                                    <img id="imagePreview" src="{{ asset('storage/' . $service->image) }}" class="w-full h-full object-cover shadow-2xl">
                                @else
                                    <div id="placeholder" class="text-gray-600 text-xs font-bold uppercase tracking-widest text-center">No Image Uploaded</div>
                                @endif
                                <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center pointer-events-none">
                                    <span class="text-white text-[10px] font-black uppercase tracking-[0.2em]">Change Image</span>
                                </div>
                            </div>

                            <input type="file" name="image" id="imageInput" accept="image/*"
                                   class="form-input w-full px-6 py-4 rounded-2xl text-sm file:mr-4 file:py-1 file:px-4 file:rounded-full file:border-0 file:text-[10px] file:font-black file:uppercase file:bg-[#d4af37] file:text-[#121212]">
                            
                            @error('image')
                                <p class="text-red-500 text-[10px] font-bold mt-2 ml-4 tracking-widest uppercase">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="pt-6 border-t border-white/5">
                        <button class="btn-gold w-full py-5 rounded-2xl text-xs font-black uppercase tracking-[0.3em] shadow-lg shadow-[#d4af37]/10">
                            Update & Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Script untuk Preview Gambar secara Real-time --}}
    <script>
        document.getElementById('imageInput').onchange = evt => {
            const [file] = document.getElementById('imageInput').files
            if (file) {
                const preview = document.getElementById('imagePreview');
                preview.src = URL.createObjectURL(file);
            }
        }
    </script>
</x-app-layout>