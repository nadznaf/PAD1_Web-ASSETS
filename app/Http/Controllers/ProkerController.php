<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kabinet;
use App\Models\Pelaksana;
use App\Models\Proker;

class ProkerController extends Controller
{
    public function detailProker($id)
    {
        // Mengambil seluruh data kabinet untuk isi pada bagian Navbar
        $dataKabinet = Kabinet::orderBy('tahun_awal_kabinet', 'desc')->get();

        // Ambil data proker berdasarkan ID
        $proker = Proker::with(['divisi', 'waktu_proker', 'dokumentasi'])->findOrFail($id);

        // Kirim data ke view GANTI NAMA VIEW user.home ke NAMA FILE DETAIL PROKER YANG SESUAI
        return view('user.proker', compact('proker', 'dataKabinet'));
    }
}
