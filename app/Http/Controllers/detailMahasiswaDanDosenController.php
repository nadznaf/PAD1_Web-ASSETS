<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;
use App\Models\Kabinet;
use App\Models\Mahasiswa;

class detailMahasiswaDanDosenController extends Controller
{
    public function detailMahasiswa($id){

        // Mengambil seluruh data kabinet untuk isi pada bagian Navbar
        $dataKabinet = Kabinet::orderBy('tahun_awal_kabinet', 'desc')->get();

        // Ambil data mahasiswa berdasarkan ID
        $mahasiswa = Mahasiswa::findOrFail($id);

        return view('user.detailMahasiswa', compact('dataKabinet', 'mahasiswa'));
    }
    public function detailDosen($id){

        // Mengambil seluruh data kabinet untuk isi pada bagian Navbar
        $dataKabinet = Kabinet::orderBy('tahun_awal_kabinet', 'desc')->get();

        // Ambil data mahasiswa berdasarkan ID
        $dosen = Dosen::findOrFail($id);

        // GANTI NAMA FILE KE DETAIL DOSEN (JIKA ADA)
        return view('user.detailDosen', compact('dataKabinet', 'dosen'));
    }
}
