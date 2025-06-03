<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kabinet;
use App\Models\Aspirasi;

class AboutController extends Controller
{
    public function index()
    {
        // Mengambil seluruh data kabinet untuk isi pada bagian Navbar
        $dataKabinet = Kabinet::orderBy('tahun_awal_kabinet', 'desc')->get();

        // Mengambil seluruh data Aspirasi yang diurutkan dari 'time_create' terbaru ke terlama
        $dataAspirasi = Aspirasi::latest()->paginate(perPage: 6);

        return view('user.about', compact('dataKabinet', 'dataAspirasi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pengirim' => 'required|string',
            'judul_aspirasi' => 'required|string',
            'isi_aspirasi' => 'required|string',
        ]);

        $aspirasi = new Aspirasi();
        $aspirasi->nama_pengirim = $request->nama_pengirim;
        $aspirasi->judul_aspirasi = $request->judul_aspirasi;
        $aspirasi->isi_aspirasi = $request->isi_aspirasi;


        $aspirasi->save();
        return redirect()->route('about')->with('success', 'Aspirasi berhasil ditambahkan.');
    }
}
