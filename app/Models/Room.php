<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'no_kamar', 'tipe', 'harga', 'lantai', 'status', 'view', 'fasilitas', 'sejarah_pembersihan'
    ];

    protected $casts = [
        'fasilitas' => 'array',
        'sejarah_pembersihan' => 'date',
    ];
}
