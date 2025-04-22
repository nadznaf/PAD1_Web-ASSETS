<?php

namespace App\Http\Controllers;

use App\Models\Dokumentasi;
use Illuminate\Http\Request;
use App\Models\Proker;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class dataDokumentasiController extends Controller
{
    public function index()
    {
        $admin = Auth::guard('admin')->user();
        $dataProker = Proker::orderBy('created_at', 'desc')->get(); //Mengambil data kabinet dari waktu pembuatan terbaru
        $dataDokumentasi = Dokumentasi::latest()->with('proker')->paginate(5);
        return view('admin.dataDokumentasi', compact('dataProker', 'dataDokumentasi', 'admin'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'id_proker' => 'required',
                'hariDokumentasi' => 'required|integer',
                'dokumentasiFoto' => 'nullable|image|mimes:jpg,jpeg,png,svg',
            ],
            [
                'id_proker.required' => 'Program kerja harus diisi.',
                'hariDokumentasi.required' => 'Keterangan hari harus diisi.',
                'hariDokumentasi.integer' => 'Keterangan hari harus berupa angka.',
                'dokumentasiFoto.image' => 'File harus berupa gambar.',
                'dokumentasiFoto.mimes' => 'Gambar harus berformat jpg, jpeg, svg, atau png.',
            ]
        );

        $data = [
            'id_proker' => $request->id_proker,
            'keterangan_hari' => $request->hariDokumentasi,
        ];

        if ($request->hasFile('dokumentasiFoto')) {
            $file = $request->file('dokumentasiFoto');
            $path = $file->store('datadokumentasi', 'public');
            $data['isi_dokumentasi'] = basename($path);
        }

        Dokumentasi::create($data);

        return redirect()->route('admin.datadokumentasi.index')->with('success', 'Data dokumentasi berhasil ditambahkan.');
    }

    public function update(Request $request, string $dokumentasi)
    {
        $dokumentasi = Dokumentasi::find($dokumentasi);
        $request->validate(
            [
                'id_proker' => 'required',
                'hariDokumentasi' => 'required|integer',
                'dokumentasiFoto' => 'nullable|image|mimes:jpg,jpeg,png,svg',
            ],
            [
                'id_proker.required' => 'Program kerja harus diisi.',
                'hariDokumentasi.required' => 'Keterangan hari harus diisi.',
                'hariDokumentasi.integer' => 'Keterangan hari harus berupa angka.',
                'dokumentasiFoto.image' => 'File harus berupa gambar.',
                'dokumentasiFoto.mimes' => 'Gambar harus berformat jpg, jpeg, svg, atau png.',
            ]
        );

        $dokumentasi->id_proker = $request->id_proker;
        $dokumentasi->keterangan_hari = $request->hariDokumentasi;

        if ($request->hasFile('dokumentasiFoto')) {
            if ($dokumentasi->isi_dokumentasi) {
                Storage::delete('public/datadokumentasi/' . $dokumentasi->isi_dokumentasi);
            }

            $file = $request->file('dokumentasiFoto');
            $path = $file->store('datadokumentasi', 'public');
            $dokumentasi->isi_dokumentasi = basename($path);
        }

        $dokumentasi->save();

        return redirect()->route('admin.datadokumentasi.index')->with('success', 'Data dokumentasi berhasil diperbarui.');
    }

    public function destroy(string $dokumentasi)
    {
        $dokumentasi = Dokumentasi::find($dokumentasi);
        if ($dokumentasi->isi_dokumentasi) {
            Storage::delete('public/datadokumentasi/' . $dokumentasi->isi_dokumentasi);
        }

        $dokumentasi->delete();

        return redirect()->route('admin.datadokumentasi.index')->with('success', 'Data dokumentasi berhasil dihapus.');
    }
}
