<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kabinet;
use App\Models\Divisi;
use App\Models\Proker;
use App\Models\Dokumentasi;


class KabinetController extends Controller {
    // DETAIL STRUKTUR KABINET
    public function strukturKabinet($id)
    {
        // Mengambil seluruh data kabinet untuk isi pada bagian Navbar
        $dataKabinet = Kabinet::orderBy('tahun_awal_kabinet', 'desc')->get();

        // Ambil data kabinet berdasarkan ID
        $kabinet = Kabinet::findOrFail($id);

        // Ambil data divisi, termasuk relasi ke proker dan staff
        $dataDivisi = Divisi::with(['proker', 'staff.mahasiswa'])->where('id_kabinet', $id)->get();

        // Kirim data ke view
        return view('user.kepengurusan', compact('kabinet', 'dataDivisi', 'dataKabinet'));
    }

    // DETAIL KABINET
    public function show($id)
    {
        // Ambil data kabinet berdasarkan ID
        $kabinet = Kabinet::findOrFail($id);
    
        // Ambil data divisi berdasarkan id_kabinet
        $dataDivisi = Divisi::with(['staff.mahasiswa'])->where('id_kabinet', $id)->get();
    
        // Ambil seluruh data proker dari seluruh divisi yang sudah di-query
        $dataProker = Proker::whereIn('id_divisi', $dataDivisi->pluck('id_divisi'))->get();
    
        // Ambil seluruh ID Proker untuk query dokumentasi
        $prokerIds = $dataProker->pluck('id_proker');
    
        // Ambil 7 data dokumentasi terbaru berdasarkan ID Proker
        $dataDokumentasi = Dokumentasi::whereIn('id_proker', $prokerIds)
            ->orderBy('created_at', 'desc') // Ganti 'created_at' sesuai kolom timestamp di tabel Dokumentasi
            ->take(7)
            ->get();
    
        // Mengambil seluruh data kabinet untuk isi pada bagian Navbar
        $dataKabinet = Kabinet::orderBy('tahun_awal_kabinet', 'desc')->get();
    
        return view('user.kabinet', compact('kabinet', 'dataDivisi', 'dataProker', 'dataDokumentasi', 'dataKabinet'));
    }   
}