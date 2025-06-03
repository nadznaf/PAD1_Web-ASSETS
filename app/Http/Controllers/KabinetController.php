<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kabinet;
use App\Models\Divisi;
use App\Models\Proker;
use App\Models\Dokumentasi;


class KabinetController extends Controller
{
    // DETAIL STRUKTUR KABINET
    public function strukturKabinet($id)
    {
        // Mengambil seluruh data kabinet untuk isi pada bagian Navbar
        $dataKabinet = Kabinet::orderBy('tahun_awal_kabinet', 'desc')->get();

        // Ambil data kabinet berdasarkan ID
        $kabinet = Kabinet::findOrFail($id);

        // Ambil divisi "Pengurus Harian"
        $divisiPengurusHarian = $kabinet->divisi->where('nama_divisi', 'Pengurus Harian')->first();

        // Cek apakah divisi "Pengurus Harian" ditemukan
        if ($divisiPengurusHarian) {
            // Ambil data staff dan ubah menjadi array key-value
            $pengurusHarian = $divisiPengurusHarian->staff->mapWithKeys(function ($staff) {
                return [$staff->nama_jabatan => $staff];
            });
        } else {
            // Jika tidak ada divisi "Pengurus Harian", set array kosong
            $pengurusHarian = [];
        }

        // Ambil data divisi, termasuk relasi ke proker dan staff
        $dataDivisi = Divisi::with(['proker', 'staff.mahasiswa'])->where('id_kabinet', $id)->get();

        // Hitung jumlah proker dari semua divisi di kabinet ini
        $jumlahProker = $kabinet->divisi->sum(function ($divisi) {
            return $divisi->proker->count();
        });

        // Hitung jumlah anggota dari semua divisi di kabinet ini
        $jumlahAnggota = $kabinet->divisi->sum(function ($divisi) {
            return $divisi->staff->count();
        });

        // Kirim data ke view
        return view('user.kepengurusan', compact('kabinet', 'pengurusHarian', 'dataDivisi', 'dataKabinet', 'jumlahProker', 'jumlahAnggota'));
    }

    // DETAIL KABINET
    public function show($id)
    {
        // Ambil data kabinet berdasarkan ID
        $kabinet = Kabinet::with(['color_pallete', 'divisi.staff'])->findOrFail($id);

        // Ambil divisi "Pengurus Harian"
        $divisiPengurusHarian = $kabinet->divisi->where('nama_divisi', 'Pengurus Harian')->first();

        // Cek apakah divisi "Pengurus Harian" ditemukan
        if ($divisiPengurusHarian) {
            // Ambil data staff dan ubah menjadi array key-value
            $pengurusHarian = $divisiPengurusHarian->staff->mapWithKeys(function ($staff) {
                return [$staff->nama_jabatan => $staff];
            });
        } else {
            // Jika tidak ada divisi "Pengurus Harian", set array kosong
            $pengurusHarian = [];
        }

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

        return view('user.kabinet', compact('kabinet', 'pengurusHarian', 'dataDivisi', 'dataProker', 'dataDokumentasi', 'dataKabinet'));
    }
}
