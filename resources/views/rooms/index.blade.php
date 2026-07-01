<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grand Luxury Hotel - Dashboard</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 antialiased">

    <!-- Top Navbar -->
    <nav class="bg-white/80 backdrop-blur-md border-b border-slate-100 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center gap-3">
                    <div class="bg-indigo-600 p-2 rounded-xl text-white shadow-md shadow-indigo-200">
                        <i class="fa-solid fa-hotel text-lg"></i>
                    </div>
                    <span class="text-xl font-bold tracking-tight bg-gradient-to-r from-slate-900 to-indigo-950 bg-clip-text text-transparent">hajisaef Resort</span>
                </div>
                <div class="flex items-center gap-4">
                    <span class="text-sm font-medium text-slate-500 bg-slate-100 px-3 py-1 rounded-full"><i class="fa-regular fa-clock me-1"></i> Admin Panel</span>
                </div>
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <!-- Header Section -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">
            <div>
                <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">Room Management</h1>
                <p class="text-sm text-slate-500 mt-1">Kelola status, harga, dan fasilitas seluruh kamar hotel dengan mudah.</p>
            </div>
            <div>
                <a href="{{ route('rooms.create') }}" class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-5 py-2.5 rounded-xl transition shadow-lg shadow-indigo-100 group">
                    <i class="fa-solid fa-plus text-sm group-hover:rotate-90 transition-transform"></i> Tambah Kamar Baru
                </a>
            </div>
        </div>

        <!-- Alert Notification -->
        @if(session('success'))
            <div class="mb-6 flex items-center gap-3 bg-emerald-50 border border-emerald-200 text-emerald-800 px-4 py-3 rounded-xl shadow-sm">
                <i class="fa-solid fa-circle-check text-lg text-emerald-500"></i>
                <p class="text-sm font-medium">{{ session('success') }}</p>
            </div>
        @endif

        <!-- Grid Cards / Stats Singkat -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm flex items-center gap-4">
                <div class="p-4 bg-emerald-50 rounded-xl text-emerald-600"><i class="fa-solid fa-door-open text-xl"></i></div>
                <div>
                    <span class="text-xs font-semibold text-slate-400 block uppercase tracking-wider">Kamar Tersedia</span>
                    <span class="text-2xl font-bold text-slate-800">{{ $kamarList->where('status', 'Available')->count() }} Kamar</span>
                </div>
            </div>
            <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm flex items-center gap-4">
                <div class="p-4 bg-rose-50 rounded-xl text-rose-600"><i class="fa-solid fa-bed text-xl"></i></div>
                <div>
                    <span class="text-xs font-semibold text-slate-400 block uppercase tracking-wider">Terisi (Occupied)</span>
                    <span class="text-2xl font-bold text-slate-800">{{ $kamarList->where('status', 'Occupied')->count() }} Kamar</span>
                </div>
            </div>
            <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm flex items-center gap-4">
                <div class="p-4 bg-amber-50 rounded-xl text-amber-600"><i class="fa-solid fa-screwdriver-wrench text-xl"></i></div>
                <div>
                    <span class="text-xs font-semibold text-slate-400 block uppercase tracking-wider">Perbaikan</span>
                    <span class="text-2xl font-bold text-slate-800">{{ $kamarList->where('status', 'Maintenance')->count() }} Kamar</span>
                </div>
            </div>
        </div>

        <!-- Table Container -->
        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-50/70 border-b border-slate-100 text-xs font-bold uppercase tracking-wider text-slate-500">
                            <th class="py-4 px-6">No. Kamar</th>
                            <th class="py-4 px-6">Tipe Kamar</th>
                            <th class="py-4 px-6">Harga per Malam</th>
                            <th class="py-4 px-6">Lantai</th>
                            <th class="py-4 px-6">Status</th>
                            <th class="py-4 px-6 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-sm font-medium text-slate-700">
                    @if(isset($kamarList) && $kamarList->count() > 0)
                        @foreach($kamarList as $k)
                        <tr class="hover:bg-slate-50/50 transition">
                            <td class="py-4 px-6 font-semibold text-slate-900">#{{ $k->no_kamar }}</td>
                            <td class="py-4 px-6">
                                <div class="flex items-center gap-2">
                                    <span class="w-2 h-2 rounded-full bg-indigo-500"></span>
                                    {{ $k->tipe }}
                                </div>
                            </td>
                            <td class="py-4 px-6 text-slate-900 font-semibold">Rp {{ number_format($k->harga, 0, ',', '.') }}</td>
                            <td class="py-4 px-6 text-slate-500">Lantai {{ $k->lantai }}</td>
                            <td class="py-4 px-6">
                                @if($k->status == 'Available')
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-700 border border-emerald-100">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Available
                                    </span>
                                @elseif($k->status == 'Occupied')
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold bg-rose-50 text-rose-700 border border-rose-100">
                                        <span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span> Occupied
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold bg-amber-50 text-amber-700 border border-amber-100">
                                        <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span> Maintenance
                                    </span>
                                @endif
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex justify-end items-center gap-2">
                                    <a href="{{ route('rooms.show', $k->id) }}" class="inline-flex items-center gap-1.5 text-xs font-semibold text-slate-600 hover:text-indigo-600 bg-slate-100 hover:bg-indigo-50 px-3 py-1.5 rounded-lg transition" title="Detail Kamar">
                                        <i class="fa-regular fa-eye"></i> Detail
                                    </a>
                                    <a href="{{ route('rooms.edit', $k->id) }}" class="inline-flex items-center gap-1.5 text-xs font-semibold text-slate-600 hover:text-amber-600 bg-slate-100 hover:bg-amber-50 px-3 py-1.5 rounded-lg transition" title="Edit Kamar">
                                        <i class="fa-regular fa-pen-to-square"></i> Edit
                                    </a>
                                    <form action="{{ route('rooms.destroy', $k->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus kamar ini?')" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-flex items-center gap-1.5 text-xs font-semibold text-slate-600 hover:text-rose-600 bg-slate-100 hover:bg-rose-50 px-3 py-1.5 rounded-lg transition" title="Hapus Kamar">
                                            <i class="fa-regular fa-trash-can"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6" class="py-12 text-center text-slate-400">
                                <div class="flex flex-col items-center justify-center gap-2">
                                    <i class="fa-regular fa-folder-open text-4xl text-slate-300"></i>
                                    <p class="font-medium">Belum ada data kamar terdaftar.</p>
                                </div>
                            </td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>