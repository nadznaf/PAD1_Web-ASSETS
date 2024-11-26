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
        $proker = Proker::findOrFail($id)->with('divisi');

        // Ambil data pelaksana dengan jabatan 'Ketua Pelaksana'
        $ketuaPelaksana = Pelaksana::with('mahasiswa') // Ambil data mahasiswa terkait
            ->where('id_proker', $id) // Filter berdasarkan id_proker
            ->where('jabatan_pelaksana', 'Ketua Pelaksana') // Filter berdasarkan jabatan
            ->first(); // Ambil hanya satu data (ketua pelaksana seharusnya unik)

        // Kirim data ke view GANTI NAMA VIEW user.home ke NAMA FILE DETAIL PROKER YANG SESUAI
        return view('user.home', compact('proker', 'ketuaPelaksana', 'dataKabinet'));
    }
}
