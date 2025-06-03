<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kabinet;
use App\Models\Artikel;
use App\Models\Proker;
use Illuminate\Support\Facades\DB;
use App\Models\Aspirasi;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{

    private function getFirstImageFromContent($content)
    {
        // Buat DOM Document
        $doc = new \DOMDocument();

        // Supaya nggak error karena HTML tidak lengkap
        libxml_use_internal_errors(true);

        // Load HTML dari string
        $doc->loadHTML($content);

        // Ambil semua tag img
        $tags = $doc->getElementsByTagName('img');

        // Kalau ada <img>, ambil src pertama
        if ($tags->length > 0) {
            return $tags->item(0)->getAttribute('src');
        }

        return null; // Kalau nggak ada gambar
    }


    private function getRssFeeds()
    {
        // Fetch RSS feed
        $response = Http::timeout(30)->get('https://trpl.sv.ugm.ac.id/feed/');

        if ($response->clientError()) {
            return "Client Error: " . $response->status();
        } elseif ($response->serverError()) {
            return "Server Error: " . $response->status();
        }

        $xml = simplexml_load_string($response->body());

        // Ambil semua item
        $items = [];
        foreach ($xml->channel->item as $item) {
            $content = (string) $item->children('content', true)->encoded;
            $img = $this->getFirstImageFromContent($content);
            $items[] = [
                'title' => (string) $item->title,
                'link' => (string) $item->link,
                'description' => (string) $item->description,
                'pubDate' => (string) $item->pubDate,
                'img' => (string) $img,
                // kamu bisa tambahkan field lain sesuai kebutuhan
            ];
        }

        return $items;
    }
    public function index()
    {
        // Mengambil seluruh data kabinet untuk isi pada bagian Navbar
        $dataKabinet = Kabinet::orderBy('tahun_awal_kabinet', 'desc')->get();

        // AMBIL 2 DATA ARTIKEL TERBARU
        $artikelTerbaru = $this->getRssFeeds();

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

        return view('user.home', compact('dataKabinet', 'prokerTerbaru', 'aspirasiTerbaru', 'artikelTerbaru'));
    }

    public function about()
    {
        // Mengembalikan view untuk halaman about
        return view('user.about');
    }
}
