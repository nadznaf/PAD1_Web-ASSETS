<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kabinet;
use App\Models\Divisi;
use App\Models\Proker;
use App\Models\WaktuProker;
use Illuminate\Support\Facades\Auth;

class dataProkerController extends Controller
{
    public function index()
    {
        $admin = Auth::guard('admin')->user();
    
        // Ambil data Proker dengan relasi Divisi, WaktuProker (sorted by tanggal_kegiatan), dan Kabinet (sorted by terbaru)
        $dataProker = Proker::latest()
            ->with([
                'divisi.kabinet' => function($query) {
                    $query->orderBy('created_at', 'desc');
                },
                'waktu_proker' => function($query) {
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

    /**
     * Store a new Proker and its WaktuProker.
     */
    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'id_divisi' => 'required',
            'judulProker' => 'required',
            'deskripsiProker' => 'required',
            'deskripsiKegiatanProker' => 'required',
            'statusProker' => 'required',
            'tanggal_kegiatan' => 'required|array',
            'tanggal_kegiatan.*' => 'required|date',
        ]);

        // Count the number of tanggal_kegiatan entries
        $jumlahHariProker = count($request->tanggal_kegiatan);

        // Save Proker data
        $proker = Proker::create([
            'id_divisi' => $request->id_divisi,
            'judul_proker' => $request->judulProker,
            'deskripsi_proker' => $request->deskripsiProker,
            'deskripsi_kegiatan_proker' => $request->deskripsiKegiatanProker,
            'status_proker' => $request->statusProker,
            'jumlah_hari_proker' => $jumlahHariProker,
        ]);

        // Save each tanggal_kegiatan
        foreach ($request->tanggal_kegiatan as $tanggal) {
            WaktuProker::create([
                'id_proker' => $proker->id_proker,
                'tanggal_kegiatan' => $tanggal,
            ]);
        }

        return redirect()->route('admin.dataproker.index')->with('success', 'Data proker berhasil ditambahkan.');
    }

    

    /**
     * Update an existing Proker and its WaktuProker.
     */
    public function update(Request $request, $id)
    {
        // Validate input
        dd($request->all());
        $request->validate([
            'id_divisi' => 'required',
            'judulProker' => 'required',
            'deskripsiProker' => 'required',
            'deskripsiKegiatanProker' => 'required',
            'statusProker' => 'required',
            'tanggal_kegiatan_edit' => 'required|array',
            'tanggal_kegiatan_edit.*' => 'required|date',
        ]);
    
        // Count the number of tanggal_kegiatan entries
        $jumlahHariProker = count($request->tanggal_kegiatan_edit);
    
        // Update Proker data
        $proker = Proker::findOrFail($id);
        $proker->update([
            'id_divisi' => $request->id_divisi,
            'judul_proker' => $request->judulProker,
            'deskripsi_proker' => $request->deskripsiProker,
            'deskripsi_kegiatan_proker' => $request->deskripsiKegiatanProker,
            'status_proker' => $request->statusProker,
            'jumlah_hari_proker' => $jumlahHariProker,
        ]);

        dd($request->tanggal_kegiatan_edit);
    
        // Delete existing TanggalKegiatan records and save new ones
        WaktuProker::where('id_proker', $proker->id_proker)->delete();
        foreach ($request->tanggal_kegiatan_edit as $tanggal) {
            WaktuProker::create([
                'id_proker' => $proker->id_proker,
                'tanggal_kegiatan' => $tanggal,
            ]);
        }
    
        return redirect()->route('admin.dataproker.index')->with('success', 'Data proker berhasil diperbarui.');
    }
    

    

    public function destroy(Proker $proker)
    {

        $proker->waktu_proker->delete();
        $proker->delete();

        return redirect()->route('admin.dataproker.index')->with('success', 'Data staff berhasil dihapus.');
    }
}
