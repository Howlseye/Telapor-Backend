<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LaporanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Laporan 1: Barang Hilang - Dompet
        $laporan1 = \App\Models\Laporan::create([
            'id_user' => 2, // Pelapor Mahasiswa
            'detail' => 'Saya kehilangan dompet hitam di kampus utama.',
            'lokasi' => 'Kampus Utama Universitas Indonesia',
            'foto' => 'dompet_hitam.jpg',
            'tipe_laporan' => 'Barang Hilang',
        ]);
        \App\Models\BarangHilang::create([
            'id_laporan' => $laporan1->id,
            'nama_barang' => 'Dompet Hitam',
            'status' => 'Hilang',
        ]);

        // Laporan 2: Kerusakan Fasilitas - AC Rusak
        $laporan2 = \App\Models\Laporan::create([
            'id_user' => 3, // Pelapor Dosen
            'detail' => 'AC di ruang kuliah tidak dingin sama sekali.',
            'lokasi' => 'Ruang Kuliah 101, Gedung A',
            'foto' => 'ac_rusak.jpg',
            'tipe_laporan' => 'Kerusakan Fasilitas',
        ]);
        \App\Models\KerusakanFasilitas::create([
            'id_laporan' => $laporan2->id,
            'nama_fasilitas' => 'AC Ruang Kuliah',
            'tingkat_kerusakan' => 'Berat',
            'status' => 'Dilaporkan',
        ]);

        // Laporan 3: Barang Hilang - Buku
        $laporan3 = \App\Models\Laporan::create([
            'id_user' => 4, // Pelapor Staff
            'detail' => 'Buku catatan hilang di perpustakaan.',
            'lokasi' => 'Perpustakaan Pusat',
            'foto' => 'buku_catatan.jpg',
            'tipe_laporan' => 'Barang Hilang',
        ]);
        \App\Models\BarangHilang::create([
            'id_laporan' => $laporan3->id,
            'nama_barang' => 'Buku Catatan',
            'status' => 'hilang',
        ]);

        // Laporan 4: Kerusakan Fasilitas - Lampu Mati
        $laporan4 = \App\Models\Laporan::create([
            'id_user' => 2, // Pelapor Mahasiswa
            'detail' => 'Lampu di koridor gedung B mati total.',
            'lokasi' => 'Koridor Gedung B',
            'foto' => 'lampu_mati.jpg',
            'tipe_laporan' => 'Kerusakan Fasilitas',
        ]);
        \App\Models\KerusakanFasilitas::create([
            'id_laporan' => $laporan4->id,
            'nama_fasilitas' => 'Lampu Koridor',
            'tingkat_kerusakan' => 'Sedang',
            'status' => 'Dilaporkan',
        ]);

        // Laporan 5: Barang Hilang - HP
        $laporan5 = \App\Models\Laporan::create([
            'id_user' => 3, // Pelapor Dosen
            'detail' => 'Handphone Samsung hilang di kantin.',
            'lokasi' => 'Kantin Kampus',
            'foto' => 'hp_samsung.jpg',
            'tipe_laporan' => 'Barang Hilang',
        ]);
        \App\Models\BarangHilang::create([
            'id_laporan' => $laporan5->id,
            'nama_barang' => 'Handphone Samsung',
            'status' => 'hilang',
        ]);
    }
}
