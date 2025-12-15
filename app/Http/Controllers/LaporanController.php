<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Http\Requests\StoreLaporanRequest;
use App\Http\Requests\UpdateLaporanRequest;
use App\Models\BarangHilang;
use App\Models\KerusakanFasilitas;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = $request->user();

        if ($user->role === 'Admin') {
            $laporans = Laporan::with(['barangHilang', 'kerusakanFasilitas'])->get();
        } else {
            $laporans = Laporan::with(['barangHilang', 'kerusakanFasilitas'])
                ->where('id_user', $user->id)
                ->get();
        }

        return response()->json([
            "message" => "Laporan Berhasil Diambil",
            "data" => $laporans
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = $request->user();

        $laporan = Laporan::create([
            'id_user' => $user->id,
            'detail' => $request->detail,
            'foto' => $request->foto,
            'lokasi' => $request->lokasi,
            'tipe_laporan' => $request->tipe_laporan,
        ]);

        if ($request->tipe_laporan === 'Barang Hilang') {
            BarangHilang::create([
                'id_laporan' => $laporan->id,
                'nama_barang' => $request->nama_barang,
                'status'=> $request->status,
            ]);
        } elseif ($request->tipe_laporan === 'Kerusakan Fasilitas') {
            KerusakanFasilitas::create([
                'id_laporan' => $laporan->id,
                'nama_fasilitas' => $request->nama_fasilitas,
                'tingkat_kerusakan' => $request->tingkat_kerusakan,
                'status' => $request->status,
            ]);
        }

        return response()->json([
            "message" => "Laporan Berhasil Dibuat",
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $laporan = Laporan::where("id", $request->id);
        return response()->json([
            "message" => "Laporan Berhasil Diambil",
            "data" => $laporan
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Laporan $laporan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $laporan = Laporan::find($request->id);
        if (!$laporan) {
            return response()->json([
                "message" => "Laporan Tidak Ditemukan",
            ], 404);
        }

        $laporan->detail = $request->detail;
        $laporan->foto = $request->foto;
        $laporan->lokasi = $request->lokasi;
        $laporan->tipe_laporan = $request->tipe_laporan;
        $laporan->save();

        if ($request->tipe_laporan === 'Barang Hilang') {
            $barangHilang = BarangHilang::where('id_laporan', $laporan->id)->first();
            if ($barangHilang) {
                $barangHilang->nama_barang = $request->nama_barang;
                $barangHilang->status = $request->status;
                $barangHilang->save();
            }
        } elseif ($request->tipe_laporan === 'Kerusakan Fasilitas') {
            $kerusakanFasilitas = KerusakanFasilitas::where('id_laporan', $laporan->id)->first();
            if ($kerusakanFasilitas) {
                $kerusakanFasilitas->nama_fasilitas = $request->nama_fasilitas;
                $kerusakanFasilitas->tingkat_kerusakan = $request->tingkat_kerusakan;
                $kerusakanFasilitas->status = $request->status;
                $kerusakanFasilitas->save();
            }
        }

        return response()->json([
            "message" => "Laporan Berhasil Diupdate",
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $laporan = Laporan::find($request->id);
        if (!$laporan) {
            return response()->json([
                "message" => "Laporan Tidak Ditemukan",
            ], 404);
        }

        if ($laporan->tipe_laporan === 'Barang Hilang') {
            BarangHilang::where('id_laporan', $laporan->id)->delete();
        } elseif ($laporan->tipe_laporan === 'Kerusakan Fasilitas') {
            KerusakanFasilitas::where('id_laporan', $laporan->id)->delete();
        }

        $laporan->delete();

        return response()->json([
            "message" => "Laporan Berhasil Dihapus",
        ], 200);
    }
}
