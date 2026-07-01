<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('no_kamar')->unique();
            $table->string('tipe'); 
            $table->decimal('harga', 10, 2);
            $table->integer('lantai');
            $table->enum('status', ['Available', 'Occupied', 'Maintenance'])->default('Available');
            $table->string('view')->nullable(); 
            $table->json('fasilitas')->nullable(); 
            $table->date('sejarah_pembersihan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};