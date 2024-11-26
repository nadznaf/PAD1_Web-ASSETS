<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kabinet;
use App\Models\Artikel;
use App\Models\Proker;
use Illuminate\Support\Facades\DB;
use App\Models\Aspirasi;
use Carbon\Carbon;


class HomeController extends Controller
{
    public function index()
    {
        // Mengambil seluruh data kabinet untuk isi pada bagian Navbar
        $dataKabinet = Kabinet::with('dosen')->orderBy('tahun_awal_kabinet', 'desc')->get();
        
        // AMBIL 2 DATA ARTIKEL TERBARU
        $artikelTerbaru = Artikel::orderBy('tanggal_terbit', 'desc')->take(2)->get();

        // Mengambil 2 data Proker terbaru berdasarkan tanggal_kegiatan terbaru dari WaktuProker
        $prokerTerbaru = Proker::with(['waktu_proker' => function ($query) {
            $query->orderBy('tanggal_kegiatan', 'asc'); // Urutkan dari tanggal terlama ke terbaru
        }])
        ->whereHas('waktu_proker', function ($query) {
            $query->orderBy('tanggal_kegiatan', 'desc');
        })
        ->orderBy(DB::raw('(SELECT MAX(tanggal_kegiatan) FROM waktu_proker WHERE waktu_proker.id_proker = proker.id_proker)'), 'desc')
        ->take(2)
        ->get();
        
        // Proses untuk menentukan rentang bulan
        $prokerTerbaru->each(function ($proker) {
            $tanggalKegiatan = $proker->waktu_proker->pluck('tanggal_kegiatan');
            
            if ($tanggalKegiatan->isNotEmpty()) {
                $bulanAwal = Carbon::parse($tanggalKegiatan->first())->locale('id')->translatedFormat('F');
                $bulanAkhir = Carbon::parse($tanggalKegiatan->last())->locale('id')->translatedFormat('F');
                
                $proker->rentang_bulan = $bulanAwal === $bulanAkhir ? $bulanAwal : "$bulanAwal - $bulanAkhir";
            } else {
                $proker->rentang_bulan = 'Tidak ada data';
            }
        });

        // AMBIL 6 DATA ASPIRASI TERBARU
        $aspirasiTerbaru = Aspirasi::orderBy('created_at', 'desc')->take(6)->get();

        return view('user.home', compact('dataKabinet', 'artikelTerbaru', 'prokerTerbaru', 'aspirasiTerbaru'));
    }

    public function about()
    {
        // Mengembalikan view untuk halaman about
        return view('user.about');
    }


}
