<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    // 1. LIST KAMAR
    public function index()
{
    $kamarList = \App\Models\Room::all(); 
    return view('rooms.index', compact('kamarList'));
}

    // 2. FORM TAMBAH KAMAR
    public function create()
    {
        return view('rooms.create');
    }

    // 3. SIMPAN KAMAR BARU
    public function store(Request $request)
    {
        $validated = $request->validate([
            'no_kamar' => 'required|unique:rooms',
            'tipe' => 'required',
            'harga' => 'required|numeric',
            'lantai' => 'required|integer',
            'status' => 'required',
            'view' => 'nullable',
            'fasilitas' => 'nullable|array',
            'sejarah_pembersihan' => 'nullable|date',
        ]);

        Room::create($validated);
        return redirect()->route('rooms.index')->with('success', 'Kamar berhasil ditambahkan!');
    }

    // 4. DETAIL KAMAR
    public function show(Room $room)
    {
        return view('rooms.show', compact('room'));
    }

    // 5. FORM EDIT KAMAR
    public function edit(Room $room)
    {
        return view('rooms.edit', compact('room'));
    }

    // 6. UPDATE DATA KAMAR
    public function update(Request $request, Room $room)
    {
        $validated = $request->validate([
            'no_kamar' => 'required|unique:rooms,no_kamar,' . $room->id,
            'tipe' => 'required',
            'harga' => 'required|numeric',
            'lantai' => 'required|integer',
            'status' => 'required',
            'view' => 'nullable',
            'fasilitas' => 'nullable|array',
            'sejarah_pembersihan' => 'nullable|date',
        ]);

        $room->update($validated);
        return redirect()->route('rooms.index')->with('success', 'Data kamar berhasil diperbarui!');
    }

    // 7. HAPUS KAMAR
    public function destroy(Room $room)
    {
        $room->delete();
        return redirect()->route('rooms.index')->with('success', 'Kamar berhasil dihapus!');
    }
}