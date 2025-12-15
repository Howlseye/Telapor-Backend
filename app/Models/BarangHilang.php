<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangHilang extends Model
{
    /** @use HasFactory<\Database\Factories\BarangHilangFactory> */
    use HasFactory;

    protected $fillable = [
        'id_laporan',
        'nama_barang',
        'status',
    ];

    public function laporan()
    {
        return $this->belongsTo(Laporan::class, 'id_laporan');
    }
}
