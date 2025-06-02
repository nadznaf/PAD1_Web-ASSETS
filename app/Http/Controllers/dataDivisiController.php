<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kabinet;
use App\Models\Divisi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class dataDivisiController extends Controller
{
    public function index()
    {
        $admin = Auth::guard('admin')->user();
        $dataDivisi = Divisi::latest()->with('kabinet')->paginate(5);
        $dataKabinet = Kabinet::all(); // Mengambil data dosen untuk dropdown
        return view('admin.dataDivisi', compact('dataDivisi', 'dataKabinet', 'admin'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'namaDivisi' => 'required',
                'deskripsiDivisi' => 'required',
                'tugasDanTanggungJawab' => 'required',
                'id_kabinet' => 'required',
                'fotoSampulDivisi' => 'nullable|image|mimes:jpg,jpeg,png,svg',
            ],
            // Error message:
            [
                'namaDivisi.required' => 'Nama divisi harus diisi.',
                'deskripsiDivisi.required' => 'Deskripsi divisi harus diisi.',
                'tugasDanTanggungJawab.required' => 'Tugas divisi harus diisi.',
                'id_kabinet.required' => 'Asal kabinet harus diisi.',
                'fotoSampulDivisi.image' => 'File harus berupa gambar.',
                'fotoSampulDivisi.mimes' => 'Gambar harus berformat jpg, jpeg, svg, atau png.',
            ]
        );

        $data = [
            'nama_divisi' => $request->namaDivisi,
            'deskripsi_divisi' => $request->deskripsiDivisi,
            'tugas_dan_tanggung_jawab' => $request->tugasDanTanggungJawab,
            'id_kabinet' => $request->id_kabinet,
        ];

        if ($request->hasFile('fotoSampulDivisi')) {
            $file = $request->file('fotoSampulDivisi');
            $path = $file->store('datadivisi', 'public');
            $data['foto_sampul_divisi'] = basename($path);
        }

        Divisi::create($data);

        return redirect()->route('admin.datadivisi.index')->with('success', 'Data divisi berhasil ditambahkan.');
    }

    public function update(Request $request, string $divisi)
    {
        $divisi = Divisi::find($divisi);

        if ($request->hasFile('fotoSampulDivisi')) {
            // Hapus foto lama jika ada
            if ($divisi->foto_sampul_divisi) {
                Storage::disk('public')->delete('datadivisi/' . $divisi->foto_sampul_divisi);
            }

            // Simpan foto baru
            $file = $request->file('fotoSampulDivisi');
            $path = $file->store('datadivisi', 'public');
            $divisi->foto_sampul_divisi = basename($path);
        }

        $divisi->nama_divisi = $request->namaDivisi;
        $divisi->deskripsi_divisi = $request->deskripsiDivisi;
        $divisi->tugas_dan_tanggung_jawab = $request->tugasDanTanggungJawab;
        $divisi->id_kabinet = $request->id_kabinet;


        $divisi->save();

        return redirect()->route('admin.datadivisi.index')->with('success', 'Data divisi berhasil diperbarui.');
    }

    public function destroy(string $divisi)
    {
        $divisi = Divisi::find($divisi);
        if ($divisi->foto_sampul_divisi) {
            Storage::disk('public')->delete('datadivisi/' . $divisi->foto_sampul_divisi);
        }
        $divisi->delete();

        return redirect()->route('admin.datadivisi.index')->with('success', 'Data divisi berhasil dihapus.');
    }
}
