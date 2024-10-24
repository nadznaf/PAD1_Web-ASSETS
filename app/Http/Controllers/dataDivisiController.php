<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kabinet;
use App\Models\Divisi;
use Illuminate\Support\Facades\Auth;

class dataDivisiController extends Controller
{
    public function index()
    {
        $admin = Auth::guard('admin')->user();
        $dataDivisi = Divisi::with('kabinet')->paginate(5);
        $dataKabinet = Kabinet::all(); // Mengambil data dosen untuk dropdown
        return view('admin.dataDivisi', compact('dataDivisi', 'dataKabinet', 'admin'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'namaDivisi' => 'required',
            'deskripsiDivisi' => 'required',
            'tugasDanTanggungJawab' => 'required',
            'id_kabinet' => 'required',
        ]);
    
        $data = [
            'nama_divisi' => $request->namaDivisi,
            'deskripsi_divisi' => $request->deskripsiDivisi,
            'tugas_dan_tanggung_jawab' => $request->tugasDanTanggungJawab,
            'id_kabinet' => $request->id_kabinet,
        ];
    
        Divisi::create($data);
    
        return redirect()->route('admin.datadivisi.index')->with('success', 'Data divisi berhasil ditambahkan.');
    }

    public function update(Request $request, Divisi $divisi)
    {
        $request->validate([
            'namaDivisi' => 'nullable',
            'deskripsiDivisi' => 'nullable',
            'tugasDanTanggungJawab' => 'nullable',
            'id_kabinet' => 'nullable',
        ]);

        $divisi->nama_divisi = $request->namaDivisi;
        $divisi->deskripsi_divisi = $request->deskripsiDivisi;
        $divisi->tugas_dan_tanggung_jawab = $request->tugasDanTanggungJawab;
        $divisi->id_kabinet = $request->id_kabinet;


        $divisi->save();

        return redirect()->route('admin.datadivisi.index')->with('success', 'Data divisi berhasil diperbarui.');
    }

    public function destroy(Divisi $divisi)
    {

        $divisi->delete();

        return redirect()->route('admin.datadivisi.index')->with('success', 'Data divisi berhasil dihapus.');
    }
}
