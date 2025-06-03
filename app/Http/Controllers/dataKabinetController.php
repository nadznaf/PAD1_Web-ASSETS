<?php

namespace App\Http\Controllers;

use App\Models\Dokumentasi;
use Illuminate\Http\Request;
use App\Models\Kabinet;
use App\Models\Proker;
use App\Models\Divisi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class dataKabinetController extends Controller
{
    public function index()
    {
        $admin = Auth::guard('admin')->user();
        $dataKabinet = Kabinet::latest()->paginate(5);
        return view('admin.dataKabinet', compact('dataKabinet', 'admin'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'namaKabinet' => 'required',
            'visiKabinet' => 'required',
            'misiKabinet' => 'required',
            'maknaKabinet' => 'nullable',
            'deskripsiKabinet' => 'required',
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

    public function update(Request $request, string $kabinet)
    {
        $kabinet = Kabinet::find($kabinet);
        $request->validate(
            [
                'namaKabinet' => 'nullable',
                'visiKabinet' => 'nullable',
                'misiKabinet' => 'nullable',
                'deskripsiKabinet' => 'nullable',
                'tahunAwalKabinet' => 'nullable',
                'tahunAkhirKabinet' => 'nullable',
                'fotoSampulKabinet' => 'nullable|image|mimes:jpeg,png,jpg,svg',
                'logoKabinet' => 'nullable|image|mimes:jpeg,png,jpg,svg',
            ],
            // error messsage:
            [
                'fotoKabinet.mimes' => 'Gambar harus berformat jpg, jpeg, svg, atau png.',
                'logoKabinet.mimes' => 'Gambar harus berformat jpg, jpeg, svg, atau png.',
            ]
        );

        $kabinet->nama_kabinet = $request->namaKabinet;
        $kabinet->visi_kabinet = $request->visiKabinet;
        $kabinet->misi_kabinet = $request->misiKabinet;
        $kabinet->makna_kabinet = $request->maknaKabinet;
        $kabinet->deskripsi_kabinet = $request->deskripsiKabinet;
        $kabinet->tahun_awal_kabinet = $request->tahunAwalKabinet;
        $kabinet->tahun_akhir_kabinet = $request->tahunAkhirKabinet;

        if ($request->hasFile('fotoSampulKabinet')) {
            // Hapus foto lama jika ada
            if ($kabinet->foto_sampul_kabinet) {
                Storage::disk('public')->delete('datakabinet/' . $kabinet->foto_sampul_kabinet);
            }

            // Simpan foto baru
            $file = $request->file('fotoSampulKabinet');
            $path = $file->store('datakabinet', 'public');
            $kabinet->foto_sampul_kabinet = basename($path);
        }

        if ($request->hasFile('logoKabinet')) {
            // Hapus foto lama jika ada
            if ($kabinet->logo_kabinet) {
                Storage::disk('public')->delete('datakabinet/' . $kabinet->logo_kabinet);
            }

            // Simpan foto baru
            $file = $request->file('logoKabinet');
            $path = $file->store('datakabinet', 'public');
            $kabinet->logo_kabinet = basename($path);
        }

        $kabinet->save();

        return redirect()->route('admin.datakabinet.index')->with('success', 'Data kabinet berhasil diperbarui.');
    }

    public function destroy(string $kabinet)
    {
        $kabinet = Kabinet::find($kabinet);
        if ($kabinet->foto_sampul_kabinet) {
            Storage::disk('public')->delete('datakabinet/' . $kabinet->foto_sampul_kabinet);
        }
        if ($kabinet->logo_kabinet) {
            Storage::disk('public')->delete('datakabinet/' . $kabinet->logo_kabinet);
        }

        $kabinet->delete();

        return redirect()->route('admin.datakabinet.index')->with('success', 'Data kabinet berhasil dihapus.');
    }
}
