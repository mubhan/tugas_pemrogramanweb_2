<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Kamar #{{ $room->no_kamar }} - hajisaef Resort</title>
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
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center gap-3">
                    <div class="bg-indigo-600 p-2 rounded-xl text-white shadow-md shadow-indigo-200">
                        <i class="fa-solid fa-hotel text-lg"></i>
                    </div>
                    <span class="text-xl font-bold tracking-tight bg-gradient-to-r from-slate-900 to-indigo-950 bg-clip-text text-transparent">hajisaef Resort</span>
                </div>
                <div>
                    <a href="{{ route('rooms.index') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-slate-600 hover:text-slate-900 bg-white border border-slate-200 hover:border-slate-300 px-4 py-2 rounded-xl transition shadow-sm">
                        <i class="fa-solid fa-arrow-left text-xs"></i> Kembali ke Dashboard
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <!-- Main Card Container -->
        <div class="bg-white rounded-3xl border border-slate-100 shadow-xl shadow-slate-100/50 overflow-hidden">
            <div class="grid grid-cols-1 md:grid-cols-12">
                
                <!-- Left Side: Cinematic Image Cover -->
                <div class="md:col-span-5 relative min-h-[300px] md:min-h-[500px] bg-slate-900">
                    <img src="https://images.unsplash.com/photo-1631049307264-da0ec9d70304?auto=format&fit=crop&q=80&w=600" 
                         class="absolute inset-0 w-full h-full object-cover opacity-90 transition-transform duration-700 hover:scale-105" alt="Interior Kamar">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/20 to-transparent"></div>
                    
                    <!-- Floating Badge on Image -->
                    <div class="absolute bottom-6 left-6 right-6 flex justify-between items-end">
                        <div>
                            <span class="text-xs font-bold text-indigo-300 uppercase tracking-widest block mb-1">Nomor Kamar</span>
                            <h2 class="text-3xl font-extrabold text-white tracking-tight">Room {{ $room->no_kamar }}</h2>
                        </div>
                        <div>
                            @if($room->status == 'Available')
                                <span class="px-3 py-1 rounded-full text-xs font-bold bg-emerald-500 text-white shadow-lg shadow-emerald-500/30">Available</span>
                            @elseif($room->status == 'Occupied')
                                <span class="px-3 py-1 rounded-full text-xs font-bold bg-rose-500 text-white shadow-lg shadow-rose-500/30">Occupied</span>
                            @else
                                <span class="px-3 py-1 rounded-full text-xs font-bold bg-amber-500 text-white shadow-lg shadow-amber-500/30">Maintenance</span>
                            @endif
                        </div>
                    </div>
                </div>
                
                <!-- Right Side: Room Details Info -->
                <div class="md:col-span-7 p-6 sm:p-10 flex flex-col justify-between">
                    <div>
                        <!-- Tipe & View -->
                        <div class="flex flex-wrap items-center justify-between gap-2 mb-4">
                            <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">{{ $room->tipe }}</h1>
                        </div>
                        
                        <p class="inline-flex items-center gap-2 text-sm font-medium text-slate-500 bg-slate-50 border border-slate-100 px-3 py-1.5 rounded-xl mb-6">
                            <i class="fas fa-mountain-city text-indigo-500"></i> {{ $room->view ?? 'Standard View' }}
                        </p>
                        
                        <hr class="border-slate-100 mb-6">
                        
                        <!-- Fasilitas Section -->
                        <h5 class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-4">Fasilitas Kamar</h5>
                        <div class="grid grid-cols-2 gap-3 mb-6">
                            @if($room->fasilitas)
                                @foreach($room->fasilitas as $f)
                                    <div class="flex items-center gap-3 p-3 bg-slate-50/50 rounded-xl border border-slate-100 hover:border-indigo-100 hover:bg-indigo-50/20 transition group">
                                        <div class="w-8 h-8 rounded-lg bg-white flex items-center justify-center text-slate-500 group-hover:text-indigo-600 shadow-sm border border-slate-100 transition">
                                            <i class="{{ $f == 'WiFi' ? 'fa-solid fa-wifi' : ($f == 'AC' ? 'fa-solid fa-snowflake' : ($f == 'TV' ? 'fa-solid fa-tv' : ($f == 'Mini Bar' ? 'fa-solid fa-champagne-glasses' : 'fa-solid fa-circle-check'))) }}"></i>
                                        </div>
                                        <span class="text-sm font-semibold text-slate-700">{{ $f }}</span>
                                    </div>
                                @endforeach
                            @else
                                <div class="col-span-2 text-sm text-slate-400 italic">Tidak ada fasilitas tambahan terdaftar.</div>
                            @endif
                        </div>

                        <!-- Status Pembersihan -->
                        <div class="flex items-center gap-3 bg-sky-50/70 border border-sky-100 p-4 rounded-2xl mb-8">
                            <div class="w-10 h-10 rounded-xl bg-sky-500/10 flex items-center justify-center text-sky-600">
                                <i class="fa-solid fa-sparkles"></i>
                            </div>
                            <div>
                                <span class="text-xs font-bold text-sky-600/80 uppercase tracking-wider block">Pembersihan Terakhir</span>
                                <span class="text-sm font-semibold text-slate-800">
                                    {{ $room->sejarah_pembersihan ? $room->sejarah_pembersihan->format('d M Y') : 'Belum terjadwal' }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Price & Action Footer -->
                    <div class="pt-6 border-t border-slate-100 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                        <div>
                            <span class="text-xs font-bold text-slate-400 uppercase tracking-widest block">Harga Per Malam</span>
                            <span class="text-3xl font-extrabold text-indigo-600">Rp {{ number_format($room->harga, 0, ',', '.') }}</span>
                        </div>
                        <div>
                            <a href="{{ route('rooms.edit', $room->id) }}" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-slate-900 hover:bg-slate-800 text-white font-semibold px-6 py-3 rounded-xl transition shadow-lg shadow-slate-900/10">
                                <i class="fa-regular fa-pen-to-square text-sm"></i> Edit Kamar Ini
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</body>
</html>