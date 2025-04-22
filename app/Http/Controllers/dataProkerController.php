<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kabinet;
use App\Models\Divisi;
use App\Models\Proker;
use App\Models\WaktuProker;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;


class dataProkerController extends Controller
{
    public function index()
    {
        $admin = Auth::guard('admin')->user();

        // Ambil data Proker dengan relasi Divisi, WaktuProker (sorted by tanggal_kegiatan), dan Kabinet (sorted by terbaru)
        $dataProker = Proker::latest()
            ->with([
                'divisi.kabinet' => function ($query) {
                    $query->orderBy('created_at', 'desc');
                },
                'waktu_proker' => function ($query) {
                    $query->orderBy('tanggal_kegiatan', 'asc'); // Sorting tanggal kegiatan dari yang terlama
                }
            ])
            ->paginate(5);

        $dataKabinet = Kabinet::orderBy('created_at', 'desc')->get(); // Mengambil data kabinet terbaru

        return view('admin.dataProker', compact('dataProker', 'dataKabinet', 'admin'));
    }

    public function getDivisi(Request $request)
    {
        $divisi = Divisi::where('id_kabinet', $request->id_kabinet)->get();

        return response()->json($divisi);
    }
    public function getProker(Request $request)
    {
        $proker = Proker::whereIn('id_divisi', $request->id_divisi)->get();

        return response()->json($proker);
    }

    /**
     * Store a new Proker and its WaktuProker.
     */
    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'id_divisi' => 'required',
            'judulProker' => 'required|string|max:255',
            'deskripsiProker' => 'required|string',
            'deskripsiKegiatanProker' => 'required|string',
            'statusProker' => 'required', // Contoh nilai status
            'tanggal_kegiatan' => 'required|array|min:1',
            'tanggal_kegiatan.*' => 'required|date',
            'fotoSampulArtikel' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg', // Validasi file gambar
        ]);

        try {
            // Hitung jumlah hari proker berdasarkan tanggal kegiatan
            $jumlahHariProker = count($request->tanggal_kegiatan);

            // Handle file upload jika ada
            $path = null;
            if ($request->hasFile('fotoSampulProker')) {
                $path = $request->file('fotoSampulProker')->store('dataproker', 'public');
            }

            // Simpan data Proker
            $proker = Proker::create([
                'id_divisi' => $request->id_divisi,
                'judul_proker' => $request->judulProker,
                'deskripsi_proker' => $request->deskripsiProker,
                'deskripsi_kegiatan_proker' => $request->deskripsiKegiatanProker,
                'status_proker' => $request->statusProker,
                'jumlah_hari_proker' => $jumlahHariProker,
                'foto_sampul_proker' => $path ? basename($path) : null,
            ]);

            // Simpan tanggal kegiatan
            foreach ($request->tanggal_kegiatan as $tanggal) {
                WaktuProker::create([
                    'id_proker' => $proker->id_proker,
                    'tanggal_kegiatan' => $tanggal,
                ]);
            }

            return redirect()->route('admin.dataproker.index')
                ->with('success', 'Data proker berhasil ditambahkan.');
        } catch (\Exception $e) {
            // Log error untuk debugging
            Log::error('Error storing Proker: ' . $e->getMessage());

            return redirect()->route('admin.dataproker.index')
                ->with('error', 'Terjadi kesalahan saat menambahkan data proker.');
        }
    }




    /**
     * Update an existing Proker and its WaktuProker.
     */
    public function update(Request $request, $id)
    {
        // Decode JSON to array
        $tanggalKegiatanBaru = json_decode($request->tanggal_kegiatan_edit_baru, true);

        $request->validate([
            'id_divisi' => 'required',
            'judulProker' => 'required',
            'deskripsiProker' => 'required',
            'deskripsiKegiatanProker' => 'required',
            'statusProker' => 'required',
            'tanggal_kegiatan_edit.*' => 'nullable|date',
            'tanggal_kegiatan_edit_baru' => 'nullable|json', // Pastikan JSON valid
            'fotoSampulProker' => 'nullable|image|mimes:jpeg,png,jpg,svg',
        ]);

        // Retrieve existing Proker
        $proker = Proker::findOrFail($id);

        // Handle file upload
        if ($request->hasFile('fotoSampulProker')) {
            // Delete old photo if exists
            if ($proker->foto_sampul_proker) {
                Storage::delete('public/dataproker/' . $proker->foto_sampul_proker);
            }
            $file = $request->file('fotoSampulProker');
            $path = $file->store('dataproker', 'public');
            $proker->foto_sampul_proker = basename($path);
        }

        // Combine old and new dates
        $tanggalKegiatanLama = $request->tanggal_kegiatan_edit ?? [];
        if (!is_array($tanggalKegiatanBaru)) {
            $tanggalKegiatanBaru = []; // Ensure it's an array if invalid
        }
        $allTanggalKegiatan = array_merge($tanggalKegiatanLama, $tanggalKegiatanBaru);

        // Update Proker
        $proker->update([
            'id_divisi' => $request->id_divisi,
            'judul_proker' => $request->judulProker,
            'deskripsi_proker' => $request->deskripsiProker,
            'deskripsi_kegiatan_proker' => $request->deskripsiKegiatanProker,
            'status_proker' => $request->statusProker,
            'jumlah_hari_proker' => count($allTanggalKegiatan),
            'foto_sampul_proker' => $proker->foto_sampul_proker ?? null,
        ]);

        // Delete old TanggalKegiatan records
        WaktuProker::where('id_proker', $proker->id_proker)->delete();

        // Save new TanggalKegiatan records
        foreach ($allTanggalKegiatan as $tanggal) {
            WaktuProker::create([
                'id_proker' => $proker->id_proker,
                'tanggal_kegiatan' => $tanggal,
            ]);
        }

        return redirect()->route('admin.dataproker.index')->with('success', 'Data proker berhasil diperbarui.');
    }




    public function destroy(string $proker)
    {
        $proker = Proker::find($proker);
        $proker->waktu_proker->delete();
        $proker->delete();

        return redirect()->route('admin.dataproker.index')->with('success', 'Data staff berhasil dihapus.');
    }
}
