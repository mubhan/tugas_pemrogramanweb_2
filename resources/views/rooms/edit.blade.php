<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Kamar {{ $room->no_kamar }} - hajisaef Resort</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght=300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 antialiased">

    <!-- Top Navbar -->
    <nav class="bg-white/80 backdrop-blur-md border-b border-slate-100 sticky top-0 z-50">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center gap-3">
                    <div class="bg-indigo-600 p-2 rounded-xl text-white shadow-md shadow-indigo-200">
                        <i class="fa-solid fa-hotel text-lg"></i>
                    </div>
                    <span class="text-xl font-bold tracking-tight bg-gradient-to-r from-slate-900 to-indigo-950 bg-clip-text text-transparent">hajisaef Resort</span>
                </div>
                <div>
                    <a href="{{ route('rooms.index') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-slate-600 hover:text-slate-900 bg-white border border-slate-200 hover:border-slate-300 px-4 py-2 rounded-xl transition shadow-sm">
                        <i class="fa-solid fa-arrow-left text-xs"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <!-- Form Header -->
        <div class="mb-8">
            <h1 class="text-2xl font-extrabold text-slate-900 tracking-tight">Edit Data Kamar</h1>
            <p class="text-sm text-slate-500 mt-1">Mengubah rincian informasi untuk unit kamar <span class="font-bold text-indigo-600">#{{ $room->no_kamar }}</span>.</p>
        </div>

        <!-- Error Alert -->
        @if ($errors->any())
            <div class="mb-6 bg-rose-50 border border-rose-200 text-rose-800 px-5 py-4 rounded-2xl shadow-sm">
                <div class="flex items-center gap-2 mb-2 font-semibold text-sm">
                    <i class="fa-solid fa-circle-exclamation text-rose-500 text-base"></i>
                    <span>Terdapat beberapa kesalahan input:</span>
                </div>
                <ul class="list-disc list-inside text-xs space-y-1 text-rose-700/90 pl-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Main Card Form -->
        <div class="bg-white rounded-3xl border border-slate-100 shadow-xl shadow-slate-100/40 overflow-hidden">
            <form action="{{ route('rooms.update', $room->id) }}" method="POST" class="p-6 sm:p-10 space-y-6">
                @csrf
                @method('PUT')

                <!-- Row 1: No Kamar & Tipe -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="no_kamar" class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">No. Kamar</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400 text-sm">#</span>
                            <input type="text" id="no_kamar" name="no_kamar" value="{{ old('no_kamar', $room->no_kamar) }}" required 
                                class="w-full pl-9 pr-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition text-sm font-medium">
                        </div>
                    </div>

                    <div>
                        <label for="tipe" class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Tipe Kamar</label>
                        <select id="tipe" name="tipe" required 
                            class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-white focus:outline-none focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition text-sm font-medium text-slate-700">
                            <option value="Standard Room" {{ old('tipe', $room->tipe) == 'Standard Room' ? 'selected' : '' }}>Standard Room</option>
                            <option value="Deluxe Room" {{ old('tipe', $room->tipe) == 'Deluxe Room' ? 'selected' : '' }}>Deluxe Room</option>
                            <option value="Suite" {{ old('tipe', $room->tipe) == 'Suite' ? 'selected' : '' }}>Suite</option>
                            <option value="Presidential Suite" {{ old('tipe', $room->tipe) == 'Presidential Suite' ? 'selected' : '' }}>Presidential Suite</option>
                        </select>
                    </div>
                </div>

                <!-- Row 2: Harga & Lantai -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="harga" class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Harga Per Malam</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400 text-xs font-bold">Rp</span>
                            <input type="number" id="harga" name="harga" value="{{ old('harga', intval($room->harga)) }}" required 
                                class="w-full pl-10 pr-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition text-sm font-medium">
                        </div>
                    </div>

                    <div>
                        <label for="lantai" class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Posisi Lantai</label>
                        <input type="number" id="lantai" name="lantai" value="{{ old('lantai', $room->lantai) }}" required 
                            class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition text-sm font-medium">
                    </div>
                </div>

                <!-- Row 3: Status & View -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="status" class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Status Kamar</label>
                        <select id="status" name="status" required 
                            class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-white focus:outline-none focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition text-sm font-medium text-slate-700">
                            <option value="Available" {{ old('status', $room->status) == 'Available' ? 'selected' : '' }}>Available</option>
                            <option value="Occupied" {{ old('status', $room->status) == 'Occupied' ? 'selected' : '' }}>Occupied</option>
                            <option value="Maintenance" {{ old('status', $room->status) == 'Maintenance' ? 'selected' : '' }}>Maintenance</option>
                        </select>
                    </div>

                    <div>
                        <label for="view" class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Pemandangan (View)</label>
                        <input type="text" id="view" name="view" value="{{ old('view', $room->view) }}" 
                            class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition text-sm font-medium">
                    </div>
                </div>

                <!-- Row 4: Checkbox Fasilitas Custom Layout -->
                <div>
                    <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-3">Fasilitas Kamar</label>
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                        @php
                            $roomFasilitas = $room->fasilitas ?? [];
                        @endphp
                        @foreach(['WiFi' => 'fa-wifi', 'AC' => 'fa-snowflake', 'TV' => 'fa-tv', 'Mini Bar' => 'fa-champagne-glasses', 'Bathtub' => 'fa-bath'] as $label => $icon)
                            <label class="flex items-center gap-3 p-3 rounded-xl border border-slate-200 hover:border-indigo-100 hover:bg-indigo-50/10 cursor-pointer transition select-none group">
                                <input type="checkbox" name="fasilitas[]" value="{{ $label }}" 
                                    {{ in_array($label, $roomFasilitas) ? 'checked' : '' }}
                                    class="w-4 h-4 rounded text-indigo-600 border-slate-300 focus:ring-indigo-500/30 accent-indigo-600">
                                <span class="text-slate-400 group-hover:text-indigo-600 transition text-sm"><i class="fa-solid {{ $icon }}"></i></span>
                                <span class="text-sm font-semibold text-slate-700">{{ $label }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <!-- Row 5: Tanggal Pembersihan -->
                <div>
                    <label for="sejarah_pembersihan" class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Tanggal Pembersihan Terakhir</label>
                    <input type="date" id="sejarah_pembersihan" name="sejarah_pembersihan" 
                        value="{{ old('sejarah_pembersihan', $room->sejarah_pembersihan ? $room->sejarah_pembersihan->format('Y-m-d') : '') }}" 
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition text-sm font-medium text-slate-600">
                </div>

                <!-- Submit Button -->
                <div class="pt-4">
                    <button type="submit" 
                        class="w-full bg-amber-500 hover:bg-amber-600 text-white font-bold py-3.5 px-6 rounded-xl transition shadow-lg shadow-amber-100 tracking-wide flex items-center justify-center gap-2 group cursor-pointer">
                        <i class="fa-regular fa-pen-to-square group-hover:-translate-y-0.5 transition-transform"></i> Perbarui Data Kamar
                    </button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>