<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KerusakanFasilitas extends Model
{
    /** @use HasFactory<\Database\Factories\KerusakanFasilitasFactory> */
    use HasFactory;

    protected $fillable = [
        'id_laporan',
        'nama_fasilitas',
        'tingkat_kerusakan',
        'status',
    ];

    public function laporan()
    {
        return $this->belongsTo(Laporan::class, 'id_laporan');
    }
}
