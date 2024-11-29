<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kabinet;
use App\Models\Divisi;
use App\Models\Proker;
use App\Models\WaktuProker;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


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
    public function getProker(Request $request)
    {
        $proker = Proker::where('id_divisi', $request->id_divisi)->get();
            
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
            \Log::error('Error storing Proker: ' . $e->getMessage());
    
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
        // 'tanggal_kegiatan_edit' => 'required|array',
        'tanggal_kegiatan_edit.*' => 'required|date',
    ]);

    // Count the number of tanggal_kegiatan entries
    if(is_null($request->tanggal_kegiatan_edit)){
        $dataTanggalLama = [];
    }else{
        $dataTanggalLama = $request->tanggal_kegiatan_edit;
    }

    $jumlahHariProker = count($dataTanggalLama + $tanggalKegiatanBaru);

    // Update Proker data
    $proker = Proker::findOrFail($id);

    // Cek jika ada upload foto baru
    if ($request->hasFile('fotoSampulProker')) {
        // Hapus foto lama jika ada
        if ($proker->foto_profil_mhs) {
            Storage::delete('public/dataproker/' . $proker->foto_sampul_proker);
        }        
        // Simpan foto baru
        $file = $request->file('fotoMhsEdit');
        $path = $file->store('datamahasiswa', 'public');
        $proker->foto_sampul_proker = basename($path);
    }
    $proker->update([
        'id_divisi' => $request->id_divisi,
        'judul_proker' => $request->judulProker,
        'deskripsi_proker' => $request->deskripsiProker,
        'deskripsi_kegiatan_proker' => $request->deskripsiKegiatanProker,
        'status_proker' => $request->statusProker,
        'jumlah_hari_proker' => $jumlahHariProker,
    ]);

    // Delete existing TanggalKegiatan records
    WaktuProker::where('id_proker', $proker->id_proker)->delete();

    if (is_null($request->tanggal_kegiatan_edit) == false){
        // Save new TanggalKegiatan records
        foreach ($request->tanggal_kegiatan_edit as $tanggal) {
            WaktuProker::create([
                'id_proker' => $proker->id_proker,
                'tanggal_kegiatan' => $tanggal,
            ]);
        }
    }

    // Check if decoding was successful
    if (is_array($tanggalKegiatanBaru)) {
        foreach ($tanggalKegiatanBaru as $tanggal) {
            WaktuProker::create([
                'id_proker' => $proker->id_proker,
                'tanggal_kegiatan' => $tanggal,
            ]);
        }
    } else {
       // Handle error if decoding fails
        return back()->withErrors(['msg' => 'Invalid data for tanggal kegiatan']);
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
