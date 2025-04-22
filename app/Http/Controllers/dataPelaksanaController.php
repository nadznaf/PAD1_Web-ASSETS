<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelaksana;
use App\Models\Mahasiswa;
use App\Models\Kabinet;
use Illuminate\Support\Facades\Auth;


class dataPelaksanaController extends Controller
{
    // Display the list of 'Pelaksana' records
    public function index()
    {
        $admin = Auth::guard(name: 'admin')->user();
        $dataPelaksana = Pelaksana::latest()->with('mahasiswa', 'proker')->paginate(5);
        $dataMahasiswa = Mahasiswa::all();
        $dataKabinet = Kabinet::all();

        return view('admin.dataPelaksana', compact('dataPelaksana', 'dataMahasiswa', 'dataKabinet', 'admin'));
    }

    // Store a new 'Pelaksana' record
    public function store(Request $request)
    {
        $request->validate([
            'id_mahasiswa' => 'required|exists:mahasiswa,id_mhs',
            'id_proker' => 'required|exists:proker,id_proker',
            'namaJabatan' => 'required|string',
        ]);

        Pelaksana::create([
            'id_mhs' => $request->id_mahasiswa,
            'id_proker' => $request->id_proker,
            'jabatan_pelaksana' => $request->namaJabatan,
        ]);

        return redirect()->route('admin.datapelaksana.index')->with('success', 'Data Pelaksana berhasil ditambahkan.');
    }

    // Update an existing 'Pelaksana' record
    public function update(Request $request, string $pelaksana)
    {
        $pelaksana = Pelaksana::find($pelaksana);
        $request->validate([
            'id_mahasiswa' => 'required|exists:mahasiswa,id_mhs',
            'id_proker' => 'required|exists:proker,id_proker',
            'namaJabatan' => 'required|string',
        ]);

        $pelaksana->update([
            'id_mhs' => $request->id_mahasiswa,
            'id_proker' => $request->id_proker,
            'jabatan_pelaksana' => $request->namaJabatan,
        ]);

        return redirect()->route('admin.datapelaksana.index')->with('success', 'Data Pelaksana berhasil diperbarui.');
    }

    // Delete an existing 'Pelaksana' record
    public function destroy(string $pelaksana)
    {
        $pelaksana = Pelaksana::find($pelaksana);
        $pelaksana->delete();

        return redirect()->route('admin.datapelaksana.index')->with('success', 'Data Pelaksana berhasil dihapus.');
    }
}
