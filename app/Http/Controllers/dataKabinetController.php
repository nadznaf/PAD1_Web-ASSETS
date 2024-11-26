<?php

namespace App\Http\Controllers;

use App\Models\Dokumentasi;
use Illuminate\Http\Request;
use App\Models\Kabinet;
use App\Models\Proker;
use App\Models\Dosen;
use App\Models\Divisi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class dataKabinetController extends Controller
{
    public function index()
    {
        $admin = Auth::guard('admin')->user();
        $dataKabinet = Kabinet::latest()->with('dosen')->paginate(5);
        $dataDosen = Dosen::all(); // Mengambil data dosen untuk dropdown
        return view('admin.dataKabinet', compact('dataKabinet', 'dataDosen', 'admin'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'namaKabinet' => 'required',
            'visiKabinet' => 'required',
            'misiKabinet' => 'required',
            'maknaKabinet' => 'nullable',
            'deskripsiKabinet' => 'required',
            'id_dosen' => 'required',
            'tahunAwalKabinet' => 'required',
            'tahunAkhirKabinet' => 'required',
            'fotoKabinet' => 'nullable|image|mimes:jpeg,png,svg',
            'logoKabinet' => 'nullable|image|mimes:jpeg,png,svg'
        ]);

        // error messsage:
        [
            'fotoKabinet.mimes' => 'Gambar harus berformat jpg, jpeg, svg, atau png.',
            'logoKabinet.mimes' => 'Gambar harus berformat jpg, jpeg, svg, atau png.',
        ];

        $data = [
            'nama_kabinet' => $request->namaKabinet,
            'visi_kabinet' => $request->visiKabinet,
            'misi_kabinet' => $request->misiKabinet,
            'makna_kabinet' => $request->maknaKabinet,
            'deskripsi_kabinet' => $request->deskripsiKabinet,
            'id_dosen' => $request->id_dosen,
            'tahun_awal_kabinet' => $request->tahunAwalKabinet,
            'tahun_akhir_kabinet' => $request->tahunAkhirKabinet,
        ];

        if ($request->hasFile('fotoKabinet')) {
            $file = $request->file('fotoKabinet');
            $path = $file->store('datakabinet', 'public');
            $data['foto_sampul_kabinet'] = basename($path);
        }
        if ($request->hasFile('logoKabinet')) {
            $file = $request->file('logoKabinet');
            $path = $file->store('datakabinet', 'public');
            $data['logo_kabinet'] = basename($path);
        }

        Kabinet::create($data);

        return redirect()->route('admin.datakabinet.index')->with('success', 'Data kabinet berhasil ditambahkan.');
    }

    public function update(Request $request, Kabinet $kabinet)
    {
        $request->validate([
            'namaKabinet' => 'nullable',
            'visiKabinet' => 'nullable',
            'misiKabinet' => 'nullable',
            'deskripsiKabinet' => 'nullable',
            'id_dosen' => 'nullable',
            'tahunAwalKabinet' => 'nullable',
            'tahunAkhirKabinet' => 'nullable',
            'fotoSampulKabinet' => 'nullable|image|mimes:jpeg,png,jpg,svg',
            'logoKabinet' => 'nullable|image|mimes:jpeg,png,jpg,svg',
        ],
        // error messsage:
        [
            'fotoKabinet.mimes' => 'Gambar harus berformat jpg, jpeg, svg, atau png.',
            'logoKabinet.mimes' => 'Gambar harus berformat jpg, jpeg, svg, atau png.',
        ]);

        $kabinet->nama_kabinet = $request->namaKabinet;
        $kabinet->visi_kabinet = $request->visiKabinet;
        $kabinet->misi_kabinet = $request->misiKabinet;
        $kabinet->makna_kabinet = $request->maknaKabinet;
        $kabinet->deskripsi_kabinet = $request->deskripsiKabinet;
        $kabinet->id_dosen = $request->id_dosen;
        $kabinet->tahun_awal_kabinet = $request->tahunAwalKabinet;
        $kabinet->tahun_akhir_kabinet = $request->tahunAkhirKabinet;

        if ($request->hasFile('fotoSampulKabinet')) {
            // Hapus foto lama jika ada
            if ($kabinet->foto_sampul_kabinet) {
                Storage::delete('public/datakabinet/' . $kabinet->foto_sampul_kabinet);
            }

            // Simpan foto baru
            $file = $request->file('fotoSampulKabinet');
            $path = $file->store('datakabinet', 'public');
            $kabinet->foto_sampul_kabinet = basename($path);
        }

        if ($request->hasFile('logoKabinet')) {
            // Hapus foto lama jika ada
            if ($kabinet->logo_kabinet) {
                Storage::delete('public/datakabinet/' . $kabinet->logo_kabinet);
            }

            // Simpan foto baru
            $file = $request->file('logoKabinet');
            $path = $file->store('datakabinet', 'public');
            $kabinet->logo_kabinet = basename($path);
        }

        $kabinet->save();

        return redirect()->route('admin.datakabinet.index')->with('success', 'Data kabinet berhasil diperbarui.');
    }

    public function destroy(Kabinet $kabinet)
    {
        if ($kabinet->foto_sampul_kabinet) {
            Storage::delete('public/datakabinet/' . $kabinet->foto_sampul_kabinet);
        }
        if ($kabinet->logo_kabinet) {
            Storage::delete('public/datakabinet/' . $kabinet->logo_kabinet);
        }

        $kabinet->delete();

        return redirect()->route('admin.datakabinet.index')->with('success', 'Data kabinet berhasil dihapus.');
    }
 
}
