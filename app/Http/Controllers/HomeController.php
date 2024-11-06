<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kabinet;
use App\Models\Artikel;
use App\Models\Proker;
use Illuminate\Support\Facades\DB;
use App\Models\Aspirasi;


class HomeController extends Controller
{
    public function index()
    {
        // AMBIL 2 DATA ARTIKEL TERBARU
        $artikelTerbaru = Artikel::orderBy('tanggal_terbit', 'desc')->take(2)->get();

        // Mengambil 2 data Proker terbaru berdasarkan tanggal_kegiatan terbaru dari WaktuProker
        $prokerTerbaru = Proker::with(['waktu_proker' => function ($query) {
                // Mengambil tanggal_kegiatan terbaru untuk setiap Proker
                $query->orderBy('tanggal_kegiatan', 'desc')->take(1);
            }])
            ->whereHas('waktu_proker', function ($query) {
                // Mengurutkan berdasarkan tanggal_kegiatan terbaru
                $query->orderBy('tanggal_kegiatan', 'desc');
            })
            ->orderBy(DB::raw('(SELECT MAX(tanggal_kegiatan) FROM waktu_proker WHERE waktu_proker.id_proker = proker.id_proker)'), 'desc')
            ->take(2)
            ->get();


        // AMBIL 6 DATA ASPIRASI TERBARU
        $aspirasiTerbaru = Aspirasi::orderBy('created_at', 'desc')->take(6)->get();
                // Mengembalikan view untuk halaman home
                $dataKabinet = Kabinet::with('dosen')->get();
                // geeratepake ai buat ambil data artikel 2 terbaru berdasarkan kolom tanggal publish-nya

                return view('user.home', compact('dataKabinet'));
            }

    public function about()
    {
        // Mengembalikan view untuk halaman about
        return view('user.about');
    }
}
