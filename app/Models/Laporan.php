<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    /** @use HasFactory<\Database\Factories\LaporanFactory> */
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'id_user',
        'detail',
        'foto',
        'lokasi',
        'tipe_laporan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function barangHilang()
    {
        return $this->hasOne(BarangHilang::class, 'id_laporan');
    }

    public function kerusakanFasilitas()
    {
        return $this->hasOne(KerusakanFasilitas::class, 'id_laporan');
    }

    public function getSpecificReport()
    {
        if ($this->tipe_laporan === 'barang_hilang') {
            return $this->barangHilang;
        } elseif ($this->tipe_laporan === 'kerusakan_fasilitas') {
            return $this->kerusakanFasilitas;
        }
        return null;
    }
}
