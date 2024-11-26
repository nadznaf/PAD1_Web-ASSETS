<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kabinet;
use App\Models\Artikel;

class ArtikelController extends Controller
{
    public function index(){

        // Mengambil seluruh data kabinet untuk isi pada bagian Navbar
        $dataKabinet = Kabinet::orderBy('tahun_awal_kabinet', 'desc')->get();

        // Ambil seluruh data artikel diurutkan berdasarkan tanggal terbit secara descending
        $dataArtikel = Artikel::orderBy('tanggal_terbit', 'desc')->get();

        return view('user.artikel', compact('dataKabinet', 'dataArtikel'));
    }
    public function detailArtikel($id){

        // Mengambil seluruh data kabinet untuk isi pada bagian Navbar
        $dataKabinet = Kabinet::orderBy('tahun_awal_kabinet', 'desc')->get();

        // Ambil data artikel berdasarkan ID
        $artikel = Artikel::findOrFail($id);

        return view('user.detailArtikel', compact('dataKabinet', 'artikel'));
    }
}
