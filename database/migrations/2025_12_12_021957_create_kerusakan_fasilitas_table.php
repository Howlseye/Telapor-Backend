<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kerusakan_fasilitas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_laporan')->constrained('laporans')->onDelete('cascade')->unique();
            $table->string('nama_fasilitas');
            $table->enum('tingkat_kerusakan', ['Ringan', 'Sedang', 'Berat']);
            $table->enum('status', ['Dilaporkan', 'Diperbaiki', 'Selesai']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kerusakan_fasilitas');
    }
};
